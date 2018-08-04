# Laravel Admin Panel
An admin panel for managing users, roles, permissions & crud.

### Requirements
    Laravel >=5.5
    PHP >= 7.0

## Features
- User, Role & Permission Manager
- CRUD Generator
- Activity Log
- Page CRUD
- Settings

## Installation

1. Run
    ```
    composer require appzcoder/laravel-admin
    ```

2. Install the admin package.
    ```
    php artisan laravel-admin:install
    ```
    > Service provider will be discovered automatically.
3. Make sure your user model's has a ```HasRoles``` trait **app/User.php**.
    ```php
    class User extends Authenticatable
    {
        use Notifiable, HasRoles;

        ...
    ```

4. You can generate CRUD easily through generator tool now.


## Usage

1. Create some permissions.

2. Create some roles.

3. Assign permission(s) to role.

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
    if (Auth::check() && Auth::user()->hasRole('admin')) {
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
    if ($user->can('permission-name')) {
        // Do something
    }
    ```

Learn more about ACL from [here](https://laravel.com/docs/master/authorization)

For activity log please read `spatie/laravel-activitylog` [docs](https://docs.spatie.be/laravel-activitylog/v2/introduction)

## Screenshots

![users](https://user-images.githubusercontent.com/1708683/43477093-1ac08d42-951c-11e8-8217-00aedc19b28d.png)

![activity log](https://user-images.githubusercontent.com/1708683/43477154-426d849e-951c-11e8-8682-ac1950114a5a.png)

![generator](https://user-images.githubusercontent.com/1708683/43477174-5381d15e-951c-11e8-9f86-2e45acd38f08.png)

![settings](https://user-images.githubusercontent.com/1708683/43679408-67b724d0-9846-11e8-8eb0-49e04c449ee3.png)

## Author

[Sohel Amin](http://www.sohelamin.com) :email: [Email Me](mailto:sohelamincse@gmail.com)

## License

This project is licensed under the MIT License - see the [License File](LICENSE) for details
