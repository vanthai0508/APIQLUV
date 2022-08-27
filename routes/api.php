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
//     Route::post('login', 'App\Http\Controllers\AuthController@login');
//     Route::post('signup', 'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::group([ 'middleware' => 'auth:api' ], function() 
    {
       
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        
        Route::get('me', 'App\Http\Controllers\AuthController@user');
      //  Route::get('list', 'App\Http\Controllers\UserController@list');

        Route::post('create', 'App\Http\Controllers\CVController@create');
        


        
        Route::group(['prefix' => 'admin'], function()
        {
            Route::get('list', 'App\Http\Controllers\CVController@list');

            Route::get('find/{id}', 'App\Http\Controllers\CVController@find');

            
        });

        

        
    });
});


?>