<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class welcomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
}
