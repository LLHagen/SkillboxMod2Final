<?php
namespace App\Controllers;

use App\Model\User;
use App\View\View;

class UserController
{
    public function indexRegistration()
    {

        $users = User::get()->toArray();;
        return new View('auth/registration', ['title' => 'Registration', 'users' => $users]);
    }

    public function login()
    {
        $users = User::get()->toArray();;
        return new View('auth/login', ['title' => 'Registration', 'users' => $users]);
    }

    public function registration()
    {
        $errors = [];
        if (empty($_POST['FIO'])) {
            $errors[] = 'Заполните поле с именем';
        }
        if (empty($_POST['email'])) {
            $errors[] = 'Заполните email';
        }
        if (empty($_POST['password'])) {
            $errors[] = 'Введите пароль';
        } else {
            if (empty($_POST['passwordTwo']) || $_POST['passwordTwo'] != $_POST['password']) {
                $errors[] = 'Пароли не совпадают';
            }
        }
        // TODO добавить обработку ошибки с правилами пользовательского соглашения

        // TODO Сделать добавление пользователя в базу данных с помощью Illuminate\Database\Eloquent

        $users = $_POST ?? 'registration';
        return new View('auth/registration', ['title' => 'Registration', 'users' => $users, 'errors' => $errors]);
    }

    public function verification()
    {
        $errors = [];

        // TODO найти в базе пользователя и проверить на соответствие лоигна пароля

        $users = $_POST ?? 'login';
        return new View('auth/login', ['title' => 'Registration', 'users' => $users, 'errors' => $errors]);
    }



}
