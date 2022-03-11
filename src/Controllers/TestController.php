<?php
namespace App\Controllers;

use App\Model\User;
use App\View\View;
use Illuminate\Http\Request;

class TestController
{
    public function index()
    {
        $user = User::find(1);

        return new View('test/test', ['title' => 'Index Page', 'user' => $user]);
    }

    public function testPost()
    {

        var_dump(Request::getHttpMethodParameterOverride());

        $user = User::find(1);

        return new View('test/test', ['title' => 'Index Page', 'user' => $user]);
    }



}
