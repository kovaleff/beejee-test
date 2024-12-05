<?php

use Controllers\admin\TaskController;
use Controllers\LoginController;
use Controllers\middlewares\Auth;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', [\Controllers\IndexController::class, 'home']);
SimpleRouter::post('/', [\Controllers\IndexController::class, 'add']);
SimpleRouter::get('/login', [\Controllers\LoginController::class, 'login']);

SimpleRouter::group(['middleware' => Auth::class], function () {
    SimpleRouter::get('/admin/task', [TaskController::class, 'list']);

    SimpleRouter::get('/admin/task/{id}', [TaskController::class, 'edit']);
    SimpleRouter::post('/admin/task/{id}', [TaskController::class, 'save']);

    SimpleRouter::get('/login', [LoginController::class, 'login'])->name('login');
    SimpleRouter::get('/logout', [LoginController::class, 'logout'])->name('logout');
    SimpleRouter::post('/login', [LoginController::class, 'doLogin'])->name('login');
});