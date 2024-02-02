@extends('layouts.app')

@section('content')
    <h1> Modifier le Livre</h1>

    <form action="{{ route('liver.update', $livre) }}" method="post" class=" p-5 rounded">
        @csrf
        @method('PUT')
        <div class="m-3">
            <label for="titre" class="form-label">Titre:</label>
            <input type="text" class="form-control" name="titre" id="titre"
                value="{{ $livre->titre ?? old('titre') }}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-3">
            <label for="auteur" class="form-label">Auteur:</label>
            <input type="text" class="form-control text-black-50" value="{{ $livre->auteur->fullName() }}" disabled>
        </div>
        <div class="m-3">
            <label for="nbr_page" class="form-label">Number de pages:</label>
            <input type="number" class="form-control" name="nbr_page" id="nbr_page"
                value="{{ $livre->nbr_page ?? old('nbr_page') }}">
            @error('nbr_page')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-3">
            <label for="année_de_publication" class="form-label">Number de pages:</label>
            <input type="date" class="form-control" name="année_de_publication" id="année_de_publication"
                value="{{ $livre->année_de_publication ?? old('année_de_publication') }}">
            @error('année_de_publication')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary mx-3">Modifier Livre</button>
        </div>
    </form>

@stop
