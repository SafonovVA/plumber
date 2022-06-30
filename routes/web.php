<?php

use App\Http\Controllers\Voyager\VoyagerServiceTokensController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::as('voyager.services.tokens.')
        ->controller(VoyagerServiceTokensController::class)
        ->prefix('services')->group(function () {
            Route::get('{service}/tokens', 'index')->name('index');
            Route::post('{service}/tokens/{token}/revoke', 'revoke')->name('revoke');
            Route::post('{service}/tokens/revoke-all', 'revokeAll')->name('revoke_all');
            Route::post('{service}/tokens/store', 'store')->name('store');
        });
});
