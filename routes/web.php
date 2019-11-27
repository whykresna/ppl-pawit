<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController', ['except' => ['show']]);

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController', ['except' => ['show']]);

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController', ['except' => ['show']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Lahans
    Route::delete('lahans/destroy', 'LahanController@massDestroy')->name('lahans.massDestroy');
    Route::resource('lahans', 'LahanController', ['except' => ['show']]);

    // Panens
    Route::delete('panens/destroy', 'PanenController@massDestroy')->name('panens.massDestroy');
    Route::post('panens/parse-csv-import', 'PanenController@parseCsvImport')->name('panens.parseCsvImport');
    Route::post('panens/process-csv-import', 'PanenController@processCsvImport')->name('panens.processCsvImport');
    Route::resource('panens', 'PanenController', ['except' => ['show']]);

    // Tengkulaks
    Route::delete('tengkulaks/destroy', 'TengkulakController@massDestroy')->name('tengkulaks.massDestroy');
    Route::resource('tengkulaks', 'TengkulakController', ['except' => ['show']]);

    // Penjualans
    Route::delete('penjualans/destroy', 'PenjualanController@massDestroy')->name('penjualans.massDestroy');
    Route::post('penjualans/parse-csv-import', 'PenjualanController@parseCsvImport')->name('penjualans.parseCsvImport');
    Route::post('penjualans/process-csv-import', 'PenjualanController@processCsvImport')->name('penjualans.processCsvImport');
    Route::resource('penjualans', 'PenjualanController', ['except' => ['show']]);
});
