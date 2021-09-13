<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Qui devo passare i dati del database:
use App\post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Qui si andrà a lavorare con i dati dei posts:
        $allPosts = Post::all();
        return view('home', compact('allPosts'));
    }
}
