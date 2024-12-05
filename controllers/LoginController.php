<?php

namespace Controllers;

use Controllers\BaseController;

class LoginController extends BaseController
{
    function login(){
        die($this->twig->render('login.twig', ['mess' => $_SESSION['mess'] ?? '']));
    }

    function doLogin(){
        $name = input('name', null, 'post');
        $pass = input('pass', null, 'post');
        if($name =="admin" && $pass == '123'){
            $_SESSION['admin'] = true;
            $_SESSION['mess'] = '';
            response()->redirect('/');
        } else {
            $_SESSION['mess'] = 'Неуспешный логин';
            response()->redirect('/login');
        }
    }

    function logout(){
        session_destroy();
        response()->redirect('/');
    }

}