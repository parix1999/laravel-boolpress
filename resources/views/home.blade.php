@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
    </div>
    <!-- Parte personalizzata da me: -->
    <div class="sezione-card">
        <div class="row">
            @foreach($allPosts as $post)

                <div class="col-4">
                    <div class="card">
                        <div class="box-img">
                            <img src="{{ $post['cover'] }}" alt="Immagine compertina di {{ $post['title'] }}">
                        </div>
                        <div class="title">
                            {{ $post['title'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>



</div>

@endsection
