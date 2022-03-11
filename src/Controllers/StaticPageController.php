<?php
namespace App\Controllers;

use App\View\View;

class StaticPageController
{
    public function userContract()
    {
        return new View('static-pages/user-contract', ['title' => 'Личный кабинет']);
    }

    public function test($param1, $param2)
    {
        return "Test Page With param1=$param1 param2=$param2";
    }
}
