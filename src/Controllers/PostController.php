<?php
namespace App\Controllers;

use App\Model\Post;
use App\View\View;

class PostController
{
    public function index($postID)
    {
        $post = Post::where('id', $postID)->get()->first()->toArray();
        return new View('post/post', ['title' => 'POSTS', 'post' => $post]);
    }
}
