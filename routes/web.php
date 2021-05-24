<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Product
$router->get('products/{id}',['as'=> 'products.get', 'uses'=> 'ProductController@get']);
$router->patch('products/{id}',['as'=> 'products.patch', 'uses'=> 'ProductController@update']);
$router->delete('products/{id}',['as'=> 'products.delete', 'uses'=> 'ProductController@delete']);
$router->get('products',['as'=> 'products.getAll', 'uses'=>'ProductController@getAll']);
$router->post('products', ['as' => 'products', 'uses' => 'ProductController@create']);

//  Customer

$router->post('login',['customer.login', 'uses'=> 'AuthController@login']);
$router->post('register',['customer.register', 'uses'=> 'AuthController@register']);

$router->group(['middleware'=>'auth'],function() use ($router){
    $router->get('orders/{id}',['order.get','uses'=>'OrderController@get']);
    $router->get('orders',['order.getAll','uses'=>'OrderController@getAll']);
    $router->post('orders', ['orders', 'uses' => 'OrderController@create']);
    $router->get('customer',['customer.profile','uses'=> 'AuthController@customer']);
    $router->post('logout',['logout','uses'=> 'AuthController@logout']);
});


