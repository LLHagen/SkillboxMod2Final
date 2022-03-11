<?php

namespace App\Controllers;

use App\Libs\Auth;
use App\Libs\Session;
use App\Model\User;
use App\View\View;

class LoginController
{
    public function login()
    {
        $users = User::get()->toArray();;
        return new View('auth/login', ['title' => 'Registration', 'users' => $users]);
    }

    public function auth()
    {
        $errors = [];
        //проверка полученных данных
        if (empty($_POST['email'])) {
            $errors['email'][] = 'Заполните email';
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'][] = 'Указанный email не соответствует формату';
            }
        }
        if (empty($_POST['password'])) {
            $errors['password'][] = 'Введите пароль';
        }

        if (Auth::verification($_POST['email'], $_POST['password'])) {
            Auth::init($_POST['email']);
        } else {
            $errors['auth'][] = 'Неверные логин или пароль';
        }

        $request = $_POST ?? '';
        return new View('auth/login', ['title' => 'Registration', 'request' => $request, 'error' => $errors]);
    }

    public function logout()
    {
        echo json_encode($_COOKIE);
        Session::init();
        echo Auth::user();
        Auth::destroy();
        Session::init();
        echo json_encode($_SESSION);
    }
}
