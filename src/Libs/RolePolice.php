<?php
namespace App\Libs;

use App\Model\User;

class RolePolice
{
    public static function isAdmin()
    {
        $userName = Auth::user();
        if ($userName) {
            $user = User::all()->where('email', $userName)->first();

            foreach ($user->roles as $role) {
                if ($role->name == 'admin')
                    return true;
            }
        }
        return false;
    }

    public static function isAuth()
    {
        if (Auth::user()) {
            return true;
        }
        return false;
    }

}