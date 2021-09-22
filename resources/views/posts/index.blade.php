@extends('layouts.app')

@section('content')
<div class="container">


    <table class="table">
            <thead class="prova">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Genere</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
           
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <th>{{$post->title}}</th>
                    <td>{{$post->price}}</td>
                    <td>
                        <img src="{{ $post->cover }}" alt="foto di {{$post->title}}">
                    </td>
                    <td>
                        {{ $categorie->genere }}
                    </td>
                    <td>
                        <a href="{{ route('posts.store') }}">
                            <button class="btn btn-outline-primary">Go Back</button>
                        </a>
                        <!-- Secondo bottone per le modifiche -->
                        <a href="{{ route('posts.edit', $post) }}">
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </a>
                    </td>
                </tr>
            
        </tbody>
    </table>

    
</div>

@endsection