<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([ 'prefix' => 'auth' ], function () 
{
    Route::get('getAllFruit', 'App\Http\Controllers\FruitController@getAll');
    
    Route::post('login', 'App\Http\Controllers\AuthController@login');

    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::post('reset-password', 'App\Http\Controllers\ResetPasswordController@sendMail');

    Route::post('reset-password/{token}', 'App\Http\Controllers\ResetPasswordController@reset');

    Route::get('getFruitFollowId/{id}', 'App\Http\Controllers\FruitController@getFruitFollowId');

    Route::group([ 'middleware' => 'auth:api' ], function() 
    {
        
        Route::get('multi-language', 'App\Http\Controllers\MultiLanguageController@index')->middleware('language');
       
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        
        Route::get('me', 'App\Http\Controllers\AuthController@user');
      

        Route::group(['prefix' => 'user'], function()
        {
            
            Route::group(['middleware' => 'User-Account'], function()
            {
                Route::get('listFruitOfCart', 'App\Http\Controllers\ShoppingCartController@listFruitOfCart');
                
                Route::get('getAllFruit', 'App\Http\Controllers\FruitController@getAll');
            
                Route::post('createShoppingCart', 'App\Http\Controllers\ShoppingCartController@create');

                Route::post('addFruitCart', 'App\Http\Controllers\ShoppingCartDetailController@addFruitCart');

                Route::post('createOrderDetail', 'App\Http\Controllers\OrderDetailController@create');

                Route::post('updateOrder', 'App\Http\Controllers\OrderController@update');

                Route::get('getFruitFollowId/{id}', 'App\Http\Controllers\FruitController@getFruitFollowId');

                Route::post('updateFruitCart', 'App\Http\Controllers\ShoppingCartDetailController@updateFruitCart');
            
            });

        });
        
        Route::group(['prefix' => 'admin'], function()
        {
            Route::group(['middleware' => 'User-Account-Admin'], function()
            {
                Route::get('listFruitOfCart', 'App\Http\Controllers\ShoppingCartController@listFruitOfCart');
                
                Route::get('getAllFruit', 'App\Http\Controllers\FruitController@getAll');
            
                Route::post('createShoppingCart', 'App\Http\Controllers\ShoppingCartController@create');

                Route::post('addFruitCart', 'App\Http\Controllers\ShoppingCartDetailController@addFruitCart');

                Route::post('createOrderDetail', 'App\Http\Controllers\OrderDetailController@create');

                Route::post('updateOrder', 'App\Http\Controllers\OrderController@update');

                Route::get('getFruitFollowId/{id}', 'App\Http\Controllers\FruitController@getFruitFollowId');

                Route::post('createFruit', 'App\Http\Controllers\FruitController@create');

                Route::post('updateFruit', 'App\Http\Controllers\FruitController@update');

                Route::delete('deleteFruit/{id}', 'App\Http\Controllers\FruitController@delete');
                
                Route::get('getAllUser', 'App\Http\Controllers\UserController@getAllUser');

                Route::post('updateUser', 'App\Http\Controllers\UserController@updateUser');
            });
        });
    });
});


?>