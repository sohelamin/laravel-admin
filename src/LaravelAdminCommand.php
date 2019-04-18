<?php

namespace Appzcoder\LaravelAdmin;

use File;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

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
        } catch (\Illuminate\Database\QueryException $e) {
            $this->error($e->getMessage());
            exit();
        }

        if (\App::VERSION() >= '5.2') {
            $this->info("Generating the authentication scaffolding");
            $this->call('make:auth');
        }

        $this->info("Publishing the assets");
        $this->call('vendor:publish', ['--provider' => 'Appzcoder\CrudGenerator\CrudGeneratorServiceProvider', '--force' => true]);
        $this->call('vendor:publish', ['--provider' => 'Appzcoder\LaravelAdmin\LaravelAdminServiceProvider', '--force' => true]);
        $this->call('vendor:publish', ['--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider', '--tag' => 'migrations']);

        $this->info("Dumping the composer autoload");
        (new Process('composer dump-autoload'))->run();

        $this->info("Migrating the database tables into your application");
        $this->call('migrate');

 

        $this->info("Overriding the AuthServiceProvider");
        $contents = File::get(__DIR__ . '/../publish/Providers/AuthServiceProvider.php');
        File::put(app_path('Providers/AuthServiceProvider.php'), $contents);

        $this->info("Successfully installed Laravel Admin!");
    }
}
