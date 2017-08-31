# Laravel Admin Panel
An admin panel for managing users, roles, permissions & crud.

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9

## Installation

For Laravel >= 5.5 you need to follow these steps
---

1. Run
    ```
    composer require appzcoder/laravel-admin
    ```

2. Install the admin package.
    ```
    php artisan laravel-admin:install
    ```

3. Make sure your user model's has a ```HasRoles``` trait **app/User.php**.
    ```php
    class User extends Authenticatable
    {
        use Notifiable, HasRoles;

        ...
    ```

4. You can generate CRUD easily through generator tool now.

For Laravel < 5.5 you need to follow these steps
---

1. Run
    ```
    composer require appzcoder/laravel-admin
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

![roles](https://user-images.githubusercontent.com/1708683/27001704-766cba0c-4df2-11e7-8f7b-1fd10237a2b7.png)

![new role](https://user-images.githubusercontent.com/1708683/27001717-8630861c-4df2-11e7-9ba3-31971c03244f.png)

![permissions](https://user-images.githubusercontent.com/1708683/27001718-90dd3e0c-4df2-11e7-8b3b-4dfd5fcd5ba8.png)

![give permission to a role](https://user-images.githubusercontent.com/1708683/27001721-9e48b080-4df2-11e7-89d1-2686a3cc67f9.png)

![users](https://user-images.githubusercontent.com/1708683/27001726-b46e4212-4df2-11e7-8656-0f5d610a8929.png)

![generator](https://user-images.githubusercontent.com/1708683/27001730-bee94b7e-4df2-11e7-8ca4-db9b26fed73f.png)


## Author

[Sohel Amin](http://www.sohelamin.com) :email: [Hire Me](mailto:sohelamincse@gmail.com)
