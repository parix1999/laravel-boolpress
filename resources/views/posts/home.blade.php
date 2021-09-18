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
                            <!-- Terzo bottone dentro alla form con il suo link diretto alla funzione destroy nel controller -->
                            <form action="{{ route('posts.update', $post) }}" method="POST">
                                <!-- Token: -->
                                @csrf
                                <!-- Metodo eliminazione -->
                                @method('DESTROY')
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    
    
    </div>
</div>

@endsection
