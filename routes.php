<?

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin'
    ],
    function() {
        Route::get('/', 'Admin\\AdminController@index')->name('index');
        Route::resource('roles', 'Admin\\RolesController', [
            'as' => 'roles.',
            'prefix' => 'roles',
            'names' => [
                'index' => 'index',
                'create' => 'create',
                'store' => 'store',
                'show' => 'show',
                'edit' => 'edit',
                'update' => 'update',
                'destroy' => 'destroy',
            ]
        ]);
        Route::resource('permissions', 'Admin\\PermissionsController', [
            'as' => 'permissions.',
            'prefix' => 'permissions',
            'names' => [
                'index' => 'index',
                'create' => 'create',
                'store' => 'store',
                'show' => 'show',
                'edit' => 'edit',
                'update' => 'update',
                'destroy' => 'destroy',
            ]
        ]);
        Route::resource('users', 'Admin\\UsersController', [
            'as' => 'users.',
            'prefix' => 'users',
            'names' => [
                'index' => 'index',
                'create' => 'create',
                'store' => 'store',
                'show' => 'show',
                'edit' => 'edit',
                'update' => 'update',
                'destroy' => 'destroy',
            ]
        ]);
        Route::resource('pages', 'Admin\\PagesController', [
            'as' => 'pages.',
            'prefix' => 'pages',
            'names' => [
                'index' => 'index',
                'create' => 'create',
                'store' => 'store',
                'show' => 'show',
                'edit' => 'edit',
                'update' => 'update',
                'destroy' => 'destroy',
            ]
        ]);
        Route::resource('activitylogs', 'Admin\\ActivityLogsController', [
            'as' => 'activitylogs.',
            'prefix' => 'activitylogs',
            'names' => [
                'index' => 'index',
                'show' => 'show',
                'destroy' => 'destroy',
            ]
        ])->only([
            'index', 'show', 'destroy'
        ]);
        Route::resource('settings', 'Admin\\SettingsController', [
            'as' => 'settings.',
            'prefix' => 'settings',
            'names' => [
                'index' => 'index',
                'create' => 'create',
                'store' => 'store',
                'show' => 'show',
                'edit' => 'edit',
                'update' => 'update',
                'destroy' => 'destroy',
            ]
        ]);
        Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator'])->name('generator.get');
        Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator'])->name('generator.post');
    }
)
