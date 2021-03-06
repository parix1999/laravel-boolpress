<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Collego i miei dati del DB
use App\post;
use App\Category;
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
        $categorie = Category::all(); // Qui dentro ci sono i dati della tabella categorie(dove c'è la relazione con la foreign key)
        // Qui si mostra la forma:
        return view('posts.create', compact('categorie')); 
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
        // Funzione per la richiesta di determinati campi nella create.
        $this->check($request);
        // Mi serve per il POST:
        // Qui si mostrano i dati da popolare
        
        // Ora si crea il model:
        $post = new post(); 
        // E ora si lancia la funzione che permette di salvare i dati dentro i vari campi del dataBase:
        $this->saveItemFromRequest($post, $request);


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
        $categorie = Category::all();
        $post = post::find($id);
        // E' già collegato, dato che la rotta della resource ha dei superpoteri e può capire l'index, e lo aggancia
        // automaticamente per poi poterlo collegare ad un link e rendere questo numero cambiabile automaticamente, qui laravel ci aiuta tanto.
        return view('posts.index', compact('post', 'categorie')); 

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
        
        
        /* Richiamo tutti i dati dal model requiest dentro ad una variabile che chiamo data:
        $data = $request->all();

        Ora facciamo l'update, senza la funzione visto che non ho nessun dato booleano:
        Allora post che sarebbe l'id viene aggiornato(update) con i data che sarebbero i request.
        $post->update($data);
        */

        // Se io qui invece del codice sopra richiamo la funzione sotto per salvare i vari dati presi dalle varie colonne del DB, dovrebbe andare:
        // Cosi da complicarsi meno la vita:
        $this->saveItemFromRequest($post, $request);


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
    
    // Per la pulizia del codice, creazione di una funzione per la compilazione dei dati nella create:
    private function saveItemFromRequest(post $post, Request $request) {
        // Si richiedono i dati dentro alla variabile data
        $data = $request->all(); // Da indietro un'array associativo (con i dati);
        $post->title = $data['title'];
        $post->abstract = $data['abstract'];
        $post->cover = $data['cover'];
        $post->price = $data['price'];
        // Ora si salva:
        $post->save(); // Se arriva a questo comando allora tutto andrà dentro al DataBase;
    }
}
