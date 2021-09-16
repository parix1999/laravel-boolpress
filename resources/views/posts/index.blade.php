@extends('layouts.app')

@section('content')
<div class="container">


    <table class="table">
            <thead class="prova">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
           
                <tr>
                    <th scope="row">{{$post->title}}</th>
                    <td>{{$post->price}}</td>
                    <td>
                        <img src="{{ $post->cover }}" alt="foto di {{$post->title}}">
                    </td>
                    <td><button class="btn btn-outline-primary">Buy</button></td>
                </tr>
            
        </tbody>
    </table>

    
</div>

@endsection