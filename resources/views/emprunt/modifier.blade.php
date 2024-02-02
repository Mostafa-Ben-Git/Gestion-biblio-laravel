@extends('layouts.app')

@section('content')
    <h1>🔃 Modifier Emprunt {{ $emprunt->id }}</h1>

    <form action="{{ route('emprunt.update', $emprunt) }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        @method('PUT')
        <div class="m-3">
            <label for="liver_id" class="form-label">Date Emprunt:</label>
            <select class="form-control" name="liver_id" value="{{ $emprunt->liver_id ?? old('liver_id') }}">
                @foreach ($livres as $livre)
                    <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                @endforeach
            </select>
        </div>
        @error('liver_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="m-3">
            <label for="date_emprunt" class="form-label">Date Emprunt:</label>
            <input type="date" class="form-control" name="date_emprunt"
                value="{{ $emprunt->date_emprunt ?? old('nom') }}">
        </div>
        @error('date_emprunt')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="m-3">
            <label for="date_retour" class="form-label">Date Retour:</label>
            <input type="date" class="form-control" name="date_retour" id="date_retour"
                value="{{ $emprunt->date_retour ?? old('date_retour') }}">
            @error('date_retour')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-warning mx-3">Modifier emprunt</button>
        </div>
    </form>

@stop
