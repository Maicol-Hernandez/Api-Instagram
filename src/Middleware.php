<?php

namespace Api\Instagram;

use Api\Instagram\Request;


abstract class Middleware
{

    abstract public function handle(Request $request): Request;
}
