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

2. Add service provider to **/config/app.php** file.
    ```php
    'providers' => [
        ...
        
        Appzcoder\LaravelAdmin\LaravelAdminServiceProvider::class,
        // For crud generator & html
        Appzcoder\CrudGenerator\CrudGeneratorServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
    ],
    ```
3. Add **Collective/Html** aliases to **/config/app.php** file.
    ```php
    'aliases' => [
        ...

        'Form'      => Collective\Html\FormFacade::class,
        'HTML'      => Collective\Html\HtmlFacade::class,
    ],
    ```
4. Run **composer du**

5. Publish the resource file.
    ```
    php artisan vendor:publish
    ```

6. Make sure your user model **/app/User.php** like below.
    ```php
    namespace App;

    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable
    {
        use HasRoles;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];
    }
    ```
7. Make sure your AuthServiceProvider **/app/Providers/AuthServiceProvider.php** similiar [this file](https://github.com/appzcoder/laravel-admin/blob/master/src/publish/Providers/AuthServiceProvider.php).

8. Run migrate command.
    ```
    php artisan migrate
    ```

9. Put the routes definitions into **routes.php** file.

    ```php
    Route::get('admin', 'Admin\\AdminController@index');
    Route::get('admin/give-role-permissions', 'Admin\\AdminController@getGiveRolePermissions');
    Route::post('admin/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');
    Route::resource('admin/roles', 'Admin\\RolesController');
    Route::resource('admin/permissions', 'Admin\\PermissionsController');
    Route::resource('admin/users', 'Admin\\UsersController');
    ```

10. If you don't have authentication resources then run below command.
    ```
    php artisan make:auth
    ```

11. You can generate CRUD easily through generator tool.


## Screenshots

![users](https://cloud.githubusercontent.com/assets/1708683/14051377/97bd54ee-f2ec-11e5-98b4-ebc8f11aaa10.png)

![roles](https://cloud.githubusercontent.com/assets/1708683/14051202/56c100fe-f2eb-11e5-87a1-bee47fd4b91b.png)

![new role](https://cloud.githubusercontent.com/assets/1708683/14051206/5e34c7da-f2eb-11e5-8164-8dce161d8621.png)

![give permission to a role](https://cloud.githubusercontent.com/assets/1708683/14051216/685f8f24-f2eb-11e5-8c4b-3c5575c62aa1.png)

![generator](https://cloud.githubusercontent.com/assets/1708683/14060938/6874fd52-f39d-11e5-96ca-a828856e70cc.png)


##Author

[Sohel Amin](http://www.sohelamin.com)
