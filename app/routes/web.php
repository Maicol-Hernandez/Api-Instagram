<?php

use Api\Instagram\Router;

use App\Controllers\UserController;
use App\Middlewares\IsAuth;
use App\Middlewares\IsAdmin;


Router::get('/', function () {
    return view('json', 'Hello world');
});

Router::get('/api/v1/users', UserController::class . '@all', IsAdmin::class);
Router::get('/api/v1/users/(?<id>\d+)', UserController::class . '@show', IsAdmin::class);
Router::post('/api/v1/users', UserController::class . '@create');
Router::put('/api/v1/users/(?<id>\d+)', UserController::class . '@update', IsAuth::class);
Router::patch('/api/v1/users/(?<id>\d+)', UserController::class . '@edit', IsAuth::class);
Router::delete('/api/v1/users/(?<id>\d+)', UserController::class . '@delete');

// Router::post('/users', UserController::class . '@create');

// Router::post('/users', function () {
//     return new \Api\Instagram\Response('json', 'User created succesfulley', 201);
// });