<?php

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

// Web routes for frontend
$router->get('/', 'HomeController@index');


// Versioned API routes
$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/users', 'UserController@all');  // list all users
    $router->get('/users/{id}', 'UserController@show'); // show the requested user
    $router->post('/users', 'UserController@create'); // create the user with posted data
});
