<?php
namespace App\Libs;

class Session {
    public static function init()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        self::init();
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
            return $_SESSION[$key] ?? false;
    }

    public static function check()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            return true;
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            unset($_SESSION);
            session_destroy();
        }
    }
}