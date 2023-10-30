<?php
use Pishgaman\Pishgaman\Http\Controllers\Api\AccessLevelController;
use Pishgaman\Pishgaman\Http\Controllers\Api\UsersController;
use Pishgaman\Pishgaman\Http\Controllers\Api\HistoryController;

Route::group(['namespace' => 'Pishgaman\Pishgaman\Http\Controllers\Api','middleware' => [ 'auth:sanctum' ] ], function() {
    Route::prefix('api/admin')->group(function () {
        Route::match(['get','post','put','delete'], 'AccessLevel', [AccessLevelController::class, 'action'])->name('PAdminAccessLevelApi');    
        Route::match(['get','post','put','delete'], 'users', [UsersController::class, 'action'])->name('PAdminUsersApi');    
        Route::match(['get','post','put','delete'], 'history', [HistoryController::class, 'action'])->name('PHistoryApi');    
    });
    
});

Route::group(['namespace' => 'Pishgaman\Pishgaman\Http\Controllers\Api','middleware' => ['web']], function() {
    Route::prefix('api')->group(function () {
        Route::post('auth', 'AuthController@action');
    });
});