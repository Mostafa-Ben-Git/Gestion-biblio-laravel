@extends('layouts.app')

@section('content')
    <h1>➕ Add New Livre</h1>

    <form action="{{ route('liver.store') }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        <div class="m-3">
            <label for="titre" class="form-label">titre:</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ old('titre') }}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-3">
            <label for="nbr_page" class="form-label">Number de pages:</label>
            <input type="number" class="form-control" name="nbr_page" id="nbr_page" value="{{ old('nbr_page') }}">
            @error('nbr_page')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-3">
            <label for="année_de_publication" class="form-label">Année de Publication:</label>
            <input type="date" class="form-control" name="année_de_publication" id="année_de_publication"
                value="{{ old('année_de_publication') ?? date('Y-m-d') }}">
            @error('année_de_publication')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-3">
            <label for="auteur" class="form-label">Select Acteur:</label>
            {{-- <input class="form-control" list="datalistOptions" name="auteur" id="auteur"
                placeholder="Type to search..."> --}}
            <select id="auteur" name="auteur_id" class="form-control-lg">
                <option value="">Select Acteur</option>
                @foreach ($auteurs as $auteur)
                    <option value="{{ $auteur->id }}">{{ $auteur->fullName() }}</option>
                @endforeach
            </select>
            @error('auteur_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary mx-3">Ajouter Livre</button>
        </div>
    </form>

@stop
