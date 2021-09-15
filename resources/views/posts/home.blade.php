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
                        <td><a href="{{ route('posts.show', $post) }}"><i class="bi bi-door-open"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    
    
    </div>
</div>

@endsection
