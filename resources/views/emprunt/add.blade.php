@extends('layout.app')

@section('body')
    <h1>➕ Ajouter Emprunt</h1>

    <form action="{{ route('emprunt.store') }}" method="post" class="bg-warning p-5 rounded my-4">
        @csrf
        <div class="m-3">
            <label for="livre" class="form-label">Choisir le Livre a emprunte:</label>
            <select class="form-control" name="liver_id" id="livre">
                <option value="">Select Livre</option>
                @foreach ($livres as $livre)
                    <option value="{{ $livre->id }}" {{ old('liver_id') == $livre->id ? 'selected' : '' }}>
                        {{ $livre->titre }}</option>
                @endforeach
            </select>
            @error('liver_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="date_emprunt" value="{{ date('Y-m-d') }}">
        <div class="m-3">
            <label for="date_retour" class="form-label">Date retour:</label>
            <input type="date" class="form-control" name="date_retour" id="date_retour"
                value="{{ old('date_retour') ?? date('Y-m-d') }}">
            @error('date_retour')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-success mx-3">Ajouter Emprunt</button>
        </div>
    </form>

@stop
