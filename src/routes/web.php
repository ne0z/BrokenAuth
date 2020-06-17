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

$router->get('/', function () use ($router) {
    return view('homepage');
});

$router->get('/login', function () use ($router) {
    session_id(@$_GET['id']);
    session_start();
    return view('login');
});

$router->get('/logout', function () use ($router) {
    session_start();
    session_destroy();
    return redirect('/');
});

$router->get('/panel', 'PanelController@success_page');

// Backend PHP

$router->post('/login', 'AuthController@verify');
