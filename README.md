# Laravel Admin Panel
An admin panel for managing users, roles, permissions & crud.

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9

## Installation

1. Run
    ```
    composer require appzcoder/laravel-admin:dev-master
    ```

2. Add service provider to **config/app.php** file.
    ```php
    'providers' => [
        ...

        Appzcoder\LaravelAdmin\LaravelAdminServiceProvider::class,
        // For crud generator & html
        Appzcoder\CrudGenerator\CrudGeneratorServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
    ],
    ```
3. Add **Collective/Html** aliases to **config/app.php** file.
    ```php
    'aliases' => [
        ...

        'Form' => Collective\Html\FormFacade::class,
        'HTML' => Collective\Html\HtmlFacade::class,
    ],
    ```
4. Run ```composer dump-autoload```

5. Install the admin package.
    ```
    php artisan laravel-admin:install
    ```

6. Make sure your user model's has a ```HasRoles``` trait **app/User.php**.
    ```php
    class User extends Authenticatable
    {
        use Notifiable, HasRoles;

        ...
    ```

7. You can generate CRUD easily through generator tool now.

## Usage

1. Create some roles.

2. Create some permissions.

3. Give permission(s) to a role.

4. Create user(s) with role.

5. For checking authenticated user's role see below:
    ```php
    // Add roles middleware in app/Http/Kernel.php
    protected $routeMiddleware = [
        ...
        'roles' => \App\Http\Middleware\CheckRole::class,
    ];
    ```

    ```php
    // Check role anywhere
    if(Auth::check() && Auth::user()->hasRole('admin')) {
        // Do admin stuff here
    } else {
        // Do nothing
    }

    // Check role in route middleware
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
       Route::get('/', ['uses' => 'AdminController@index']);
    });
    ```

6. For checking permissions see below:

    ```php
    if($user->can('permission-name')) {
        // Do something
    }
    ```

Learn more about ACL from [here](https://laravel.com/docs/5.3/authorization)

## Screenshots

![roles](https://cloud.githubusercontent.com/assets/1708683/19971502/70eff1f6-a209-11e6-8fa0-1ff381198f1a.png)

![new role](https://cloud.githubusercontent.com/assets/1708683/19971566/98785114-a209-11e6-9a2d-d027c13eb2d6.png)

![permissions](https://cloud.githubusercontent.com/assets/1708683/19971588/a90eafbe-a209-11e6-8631-f2489dc6c547.png)

![give permission to a role](https://cloud.githubusercontent.com/assets/1708683/19971609/bb4fa1a6-a209-11e6-891b-5b10629ea1a9.png)

![users](https://cloud.githubusercontent.com/assets/1708683/19971636/cb71096c-a209-11e6-964f-a60d7f84b434.png)

![generator](https://cloud.githubusercontent.com/assets/1708683/19971653/dc239810-a209-11e6-8348-83ff1eb4add6.png)


## Author

[Sohel Amin](http://www.sohelamin.com)
