<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Collego i miei dati del DB
use App\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Qui ci sarà la "home" con tutte le cards dei post:
        // Passo tutti i dati, per poi ritornarli alla view:
        $allPosts = post::all();

        return view('posts.home', compact('allPosts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Qui ci andranno i dati del singolo post:
        // Quindi richiamiamo il singolo dato, il singolo post:
        $post = post::find($id);
        // E' già collegato, dato che la rotta della resource ha dei superpoteri e può capire l'index, e lo aggancia
        // automaticamente per poi poterlo collegare ad un link e rendere questo numero cambiabile automaticamente, qui laravel ci aiuta tanto.
        return view('posts.index', compact('post')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}