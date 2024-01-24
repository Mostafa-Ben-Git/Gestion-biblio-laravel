@extends('layout.app')

@section('body')
    <h1>🔃 Modifier Auteur {{ $auteur->fullName() }}</h1>

    <form action="{{ route('auteur.update', $auteur) }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        @method('PUT')
        <div class="m-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" name="nom" value="{{ $auteur->nom ?? old('nom') }}">
        </div>
        @error('nom')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="m-3">
            <label for="prenom" class="form-label">Prenom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom"
                value="{{ $auteur->prenom ?? old('prenom') }}">
            @error('prenom')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-warning mx-3">Modifier Auteur</button>
        </div>
    </form>

@stop
