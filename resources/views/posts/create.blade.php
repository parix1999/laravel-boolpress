@extends('layouts.app')

@section('content')
<!-- Codice per gli errori: -->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Qui andrà la mia form: -->
<div class="container">
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <!-- Devo passare i dati della tabella per fare in modo che capisca i nomi -->
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        
        <div class="form-group">
            <label for="abstract">Descrizione</label>
            <input type="text" class="form-control" name="abstract" id="abstract">
        </div>
    
        <div class="form-group">
            <label for="cover">Cover(image)</label>
            <input type="text" class="form-control" name="cover" id="cover">
        </div>
    
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" step ="0.01" name="price" id="price">
        </div>
    
        <button type="submit" class="btn btn-primary">Salva</button>
    
    </form>

</div>



@endsection