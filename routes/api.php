<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('import', 'ImportController@index')->name('import');

Route::prefix('product')->group(static function () {
    Route::post('cost', 'ProductController@cost')->name('cost');
    Route::post('cheapest', 'ProductController@cheapest')->name('cheapest');
    Route::post('dearest', 'ProductController@dearest')->name('dearest');
    Route::post('cost-by-seller', 'ProductController@costBySeller')->name('cost-by-seller');
    Route::get('by-group', 'ProductController@byGroup')->name('by-group');
});
