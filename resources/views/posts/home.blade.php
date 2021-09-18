@extends('layouts.app')

@section('content')
<div class="bg">
    
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Parte personalizzata da me: -->
        <a href="{{ route('posts.create') }}">Aggiungi un Post +</a>
        <table class="table">
            <thead class="prova">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allPosts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->abstract }}</td>
                        <td>
                            <img src="{{ $post->cover }}" alt="foto di {{$post->title}}">
                        </td>
                        <td>
                            <!-- primo bottone per le specifiche -->
                            <a href="{{ route('posts.show', $post) }}">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-door-open"></i>
                                </button>
                            </a>
                            <!-- Secondo bottone per le modifiche -->
                            <a href="{{ route('posts.edit', $post) }}">
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </a>
                            
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
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    
    
    </div>
</div>

@endsection
