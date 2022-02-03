<?php
namespace App\Controllers;

use App\Model\Post;
use App\View\View;

class HomeController
{
    public function index()
    {
        $posts = Post::get();
        return new View('home/homepage', ['title' => 'Index Page', 'posts' => $posts]);
    }
}
