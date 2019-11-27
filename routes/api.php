<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController', ['except' => ['show']]);

    // Roles
    Route::apiResource('roles', 'RolesApiController', ['except' => ['show']]);

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController', ['except' => ['show']]);

    // Lahans
    Route::apiResource('lahans', 'LahanApiController', ['except' => ['show']]);

    // Panens
    Route::apiResource('panens', 'PanenApiController', ['except' => ['show']]);

    // Tengkulaks
    Route::apiResource('tengkulaks', 'TengkulakApiController', ['except' => ['show']]);

    // Penjualans
    Route::apiResource('penjualans', 'PenjualanApiController', ['except' => ['show']]);
});
