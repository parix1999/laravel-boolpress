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
        // Qui creo il collegamento dati per il form del view, solo il ritorno della view:
        // Qui si mostra la forma:
        return view('posts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ora facciamo la validizione, prima del save cosi non mi agggiorna il database:
        /*
        $request->validate([
            "cover" => "required|url"
        ]);
        */
        // Funzione per la richiesta di determinati campi nnella create.
        $this->check($request);
        // Mi serve per il POST:
        // qui andrà il dd per vedere se i dati partono:
        // Qui si mostrano i dati da popolare
        
        // Si richiedono i dati dentro alla variabile data
        $data = $request->all(); // Da indietro un'array associativo (con i dati);
        // Ora si crea il model:
        $post = new post(); 
        $post->title = $data['title'];
        $post->abstract = $data['abstract'];
        $post->cover = $data['cover'];
        $post->price = $data['price'];
        // Ora si salva:
        $post->save(); // Se arriva a questo comando allora tutto andrà dentro al DataBase;
       
        // Ora manca la funzione di return, per la redirect:
        return redirect()->route('posts.show', $post);

        

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
   
    public function edit(post $post)
    {
        // Qui ci va il return della view nuova del forum modifica
        return view('posts.change', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        // Funzione per la richiesta di determinati campi nel change
        $this->check($request);
        // Qui tipo lo store
        // Richiamo tutti i dati dal model requiest dentro ad una variabile che chiamo data:
        $data = $request->all();

        // Ora facciamo l'update, senza la funzione visto che non ho nessun dato booleano:
        // Allora post che sarebbe l'id viene aggiornato(update) con i data che sarebbero i request.
        $post->update($data);
        
        // Adesso serve il return:
        // Si rindirizza(redirect) nella rotta di post show, dove ci sono tutti i post e dove si deve vedere le modifiche,
        // e si scrive il $post la variabile id per far capire quale post va modificato. 
        return redirect()->route('posts.show', $post);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        // Qui ci va la funzione che distrugge e cancella un'elemento dentro il DB:
        // Metodo per la cancellazione, dove li passo l'id del model post per farli capire quale eliminare
        $post->delete();

        // Ora serve la nuova rotta del return:
        return redirect()->route('posts.index');

    }

    // Funzione che controlla se tutti i campi sono stati compilati e se l'url è effetivamente un'url:
    private function check(Request $request) {
        // Funzione per la validizione di tutti i campi, sia per il create che per il change:
        $request->validate([
            'title' => 'required',
            'cover' => ['required', 'url'],
            'abstract' => 'required',
            'price' => 'required'
        ]);
    }   
}
