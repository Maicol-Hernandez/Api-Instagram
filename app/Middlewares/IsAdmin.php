<?php

namespace App\Middlewares;

use Api\Instagram\middlewares\Middleware;
use Api\Instagram\Request;

class IsAdmin extends Middleware
{

    public function handle(Request $request): Request
    {

        return $request;
    }
}
