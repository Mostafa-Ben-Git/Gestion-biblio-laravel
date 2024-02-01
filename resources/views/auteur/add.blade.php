@extends('layouts.app')

@section('content')
    <h1>➕ Ajouter Auteur</h1>

    <form action="{{ route('auteur.store') }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        <div class="m-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
            @error('nom')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-3">
            <label for="prenom" class="form-label">Prenom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}">
            @error('prenom')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-success  mx-3">Ajouter Auteur</button>
        </div>
    </form>

@stop
