<?php

namespace Api\Instagram\middlewares;

use Api\Instagram\Request;


abstract class Middleware
{

    abstract public function handle(Request $request): Request;
}
