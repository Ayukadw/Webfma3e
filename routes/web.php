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

$router->group(['prefix' => 'api'], function () use ($router) {
    
    $router->post('/login', 'AuthController@login');

    // ===== USERS =====
    $router->get('/users', 'UserController@index');
    $router->get('/users/{id}', 'UserController@show');
    $router->post('/users', 'UserController@store');
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/{id}', 'UserController@destroy');

    // ===== CATEGORIES =====
    $router->get('/categories', 'CategoryController@index');
    $router->get('/categories/{id}', 'CategoryController@show');
    $router->post('/categories', 'CategoryController@store');
    $router->put('/categories/{id}', 'CategoryController@update');
    $router->delete('/categories/{id}', 'CategoryController@destroy');

    // ===== SIZES =====
    $router->get('/sizes', 'SizeController@index');
    $router->get('/sizes/{id}', 'SizeController@show');
    $router->post('/sizes', 'SizeController@store');
    $router->put('/sizes/{id}', 'SizeController@update');
    $router->delete('/sizes/{id}', 'SizeController@destroy');

    // ===== COSTUMES =====
    $router->get('/costumes', 'CostumeController@index');
    $router->get('/costumes/{id}', 'CostumeController@show');
    $router->post('/costumes', 'CostumeController@store');
    $router->put('/costumes/{id}', 'CostumeController@update');
    $router->delete('/costumes/{id}', 'CostumeController@destroy');

    // ===== ORDERS =====
    $router->get('/orders', 'OrderController@index');
    $router->get('/orders/{id}', 'OrderController@show');
    $router->post('/orders', 'OrderController@store');
    $router->put('/orders/{id}', 'OrderController@update');
    $router->delete('/orders/{id}', 'OrderController@destroy');

    // ===== ORDER ITEMS =====
    $router->get('/order-items', 'OrderItemController@index');
    $router->get('/order-items/{id}', 'OrderItemController@show');
    $router->post('/order-items', 'OrderItemController@store');
    $router->put('/order-items/{id}', 'OrderItemController@update');
    $router->delete('/order-items/{id}', 'OrderItemController@destroy');

    // ===== PAYMENTS =====
    $router->get('/payments', 'PaymentController@index');
    $router->get('/payments/{id}', 'PaymentController@show');
    $router->post('/payments', 'PaymentController@store');
    $router->put('/payments/{id}', 'PaymentController@update');
    $router->delete('/payments/{id}', 'PaymentController@destroy');
});