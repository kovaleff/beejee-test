<?php

namespace Controllers\middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Auth implements IMiddleware
{
    public function handle(Request $request): void
    {
        if(!isset($_SESSION['admin'])){
            request()->setRewriteUrl('/login');
        }
    }
}