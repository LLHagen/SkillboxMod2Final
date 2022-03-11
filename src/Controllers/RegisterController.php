<?php
namespace App\Controllers;

use App\Libs\Auth;
use App\Libs\Session;
use App\Libs\Validator;
use App\Model\User;
use App\View\View;

class RegisterController
{
    public function index()
    {
        $users = User::get()->toArray();;
        return new View('auth/registration', ['title' => 'Registration', 'users' => $users]);
    }

    public function registration()
    {
        $errors = [];

        $validator = new Validator();
        if (empty($_POST['acceptRules'])) {
            $errors['acceptRules'][] = 'Примите правила пользовательского соглашения';
        }

        $attributes = $validator->validate([
            'name' => 'required|max:100|min:2',
            'email' => 'required|email|max:100|min:2',
            'password' => 'required|pass|max:100|min:2',
            'passwordTwo' => 'pass2'
        ]);

        if (!$attributes) {
            $errors = $errors + $validator->getErrors();
        } else {
            if (empty(User::where('email', $attributes['email'])->first())) {

                $user = User::create($attributes);
                $user->save();
                Auth::init($attributes['email']);
            } else {
                $errors['email'][] = 'E-mail уже используется';
            }
        }

        return new View('auth/registration', ['title' => 'Registration', 'request' => $_POST ?? '', 'error' => $errors]);
    }

}
