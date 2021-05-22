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
$router->get('products/{id}',['as'=> 'products', 'uses'=> 'ProductController@get']);
$router->patch('products/{id}',['as'=> 'products', 'uses'=> 'ProductController@update']);
$router->delete('products/{id}',['as'=> 'products', 'uses'=> 'ProductController@delete']);
$router->get('products',['as'=> 'products', 'uses'=>'ProductController@getAll']);
$router->post('products', ['as' => 'products', 'uses' => 'ProductController@create']);

//  Customer
// $router->get('customers/{id}', ['as' => 'customers', 'uses' => 'CustomerController@get']);
// $router->get('customers', ['as' => 'customers', 'uses' => 'CustomerController@getAll']);
$router->post('customers', ['uses'=>'CustomerController@register']);
