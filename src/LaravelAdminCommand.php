<?php

namespace Appzcoder\LaravelAdmin;

use App;
use File;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Database\QueryException;

class LaravelAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Laravel Admin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->call('migrate');
        } catch (QueryException $e) {
            $this->error($e->getMessage());
            exit();
        }

        $this->info("Generating the authentication scaffolding");
        if (App::VERSION() < '6.0') {
            $this->call('make:auth');
        }

        $this->info("Publishing the assets");
        $this->call('vendor:publish', ['--provider' => 'Appzcoder\CrudGenerator\CrudGeneratorServiceProvider', '--force' => true]);
        $this->call('vendor:publish', ['--provider' => 'Appzcoder\LaravelAdmin\LaravelAdminServiceProvider', '--force' => true]);
        $this->call('vendor:publish', ['--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider', '--tag' => 'migrations']);

        $this->info("Dumping the composer autoload");
        (new Process(['composer dump-autoload']))->run();

        $this->info("Migrating the database tables into your application");
        $this->call('migrate');

        $this->info("Adding the routes");

        $routeFile = base_path('routes/web.php');
        $controllerNamespace = App::VERSION() >= '8.0' ? 'App\Http\Controllers\Admin\\' : 'Admin\\';

        $routes =
            <<<EOD
Route::get('admin', '{$controllerNamespace}AdminController@index');
Route::resource('admin/roles', '{$controllerNamespace}RolesController');
Route::resource('admin/permissions', '{$controllerNamespace}PermissionsController');
Route::resource('admin/users', '{$controllerNamespace}UsersController');
Route::resource('admin/pages', '{$controllerNamespace}PagesController');
Route::resource('admin/activitylogs', '{$controllerNamespace}ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', '{$controllerNamespace}SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

EOD;

        File::append($routeFile, "\n" . $routes);

        $this->info("Overriding the AuthServiceProvider");
        $contents = File::get(__DIR__ . '/../publish/Providers/AuthServiceProvider.php');
        File::put(app_path('Providers/AuthServiceProvider.php'), $contents);

        $this->info("Successfully installed Laravel Admin!");
    }
}
