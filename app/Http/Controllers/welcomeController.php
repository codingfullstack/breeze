<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class welcomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['categories', 'likes'])->get();
        return view('welcome', compact('posts'));
    }
}
