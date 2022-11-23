<?php

use Api\Instagram\Router;

use App\controllers\UserController;
use App\Middlewares\IsAuth;
use App\Middlewares\IsAdmin;


Router::get('/', function () {
    return view('json', 'Hello world');
});

Router::get('/users', UserController::class . '@all', IsAdmin::class);
Router::post('/users', UserController::class . '@create');
Router::put('/users/(?<id>\d+)', UserController::class . '@update', IsAuth::class);
Router::patch('/users/(?<id>\d+)', UserController::class . '@edit', IsAuth::class);
Router::delete('/users/(?<id>\d+)', UserController::class . '@delete');

// Router::post('/users', UserController::class . '@create');

// Router::post('/users', function () {
//     return new \Api\Instagram\Response('json', 'User created succesfulley', 201);
// });