<?php

namespace App\Libs;

use App\Model\User;

class Auth
{
    private static $authHomePath = '/profile';
    private static $logoutHomePath = '/login';

    public static function init($user)
    {
        Session::set('authUsername', $user);
        header('Location: ' . self::$authHomePath);
    }

    public static function user()
    {
        return Session::get('authUsername');
    }

    public static function verification($login, $password): bool
    {
        $user =  User::where('email', $login)->first();
        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        Session::destroy();
        header('Location: ' . self::$logoutHomePath);
    }
}
