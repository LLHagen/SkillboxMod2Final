<?php
namespace App\Controllers;

use App\Libs\Auth;
use App\Libs\Session;
use App\Libs\Upload;
use App\Libs\Validator;
use App\Model\User;
use App\View\View;
use http\Env\Request;

class UserController
{
    public function index()
    {
        Session::init();
        $userName = Auth::user();

        if ($userName) {
            $user = User::all()->where('email', $userName)->first();
        }
        return new View('profile/profile', ['title' => 'Profile', 'user' => $user ?? '']);
    }

    public function update()
    {
        Session::init();
        $userName = Auth::user();

        if ($userName) {

            $user = User::where('email', $userName);

            $validator = new Validator();
            $attributes = $validator->validate([
                'name' => 'required|max:100|min:2',
                'about' => 'max:10000'
            ]);

            if (isset($_FILES['image'])) {
                $result = Upload::uploadImage();
                if ($result['error'] === false) {
                    $attributes['image'] = $result['path'];
                } else {
                    $errors['image'] = $result['error'];
                }
            }
            if (!$attributes) {
                $errors = $errors + $validator->getErrors();
            } else {
                $user->update($attributes);
            }
        }

        $user = $user->first();
        return new View('profile/profile', ['title' => 'Profile', 'errors' => $errors ?? [], 'user' => $user ?? '']);
    }
}
