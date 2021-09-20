@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}">Aggiungi un Post +</a>
    <div class="row">
        @foreach($allPosts as $post)
            
                <div class="col-sm-6 col-md-4 col-lg-3 content" style="width: 18rem;">
                    <img src="{{ $post->cover }}" class="card-img-top" alt="immagine del post {{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->abstract }}</p>
                        <!-- Bottone specifiche -->
                        <a href="{{ route('posts.show', $post) }}">
                             <button type="button" class="btn btn-primary">
                                Specifiche
                            </button>
                        </a>
                        @if(Auth::check())
                            <!-- Button trigger modal -->
                            <!-- Quinidi su data-target si passa l'id dell'oggetto che si vuole eliminare -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$post->id}}">
                                <i class="bi bi-trash"></i>
                            </button>
                
                            <!-- Modal -->
                            <!-- Qui su id li si passa l'id dell'oggetto da eliminare -->
                            <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sicuro di voler eliminare il post {{$post->title}} ???</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Non potrai più tornare indietro... 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- Terzo bottone dentro alla form con il suo link diretto alla funzione destroy nel controller -->
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Fallo!!!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
        
                    </div>
                </div>
            
                
        @endforeach
    </div>

    
      
</div>

@endsection
