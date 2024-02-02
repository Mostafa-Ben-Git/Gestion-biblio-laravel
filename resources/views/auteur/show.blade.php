@extends('layouts.app')

@section('content')
    <div class="p-4 w-75 mx-auto my-5 rounded">
        @if (session()->has('pass'))
            <div class="alert alert-success">{!! session('pass') !!}</div>
        @endisset
        <div class="w-75 mx-auto">
            <p class="p-3 rounded bg-light">ID Auteur : {{ $auteur->id }}</p>
            <p class="p-3 rounded bg-light">Nom : {{ $auteur->nom }}</p>
            <p class="p-3 rounded bg-light">Prenom: {{ $auteur->prenom }}</p>
            <p class="p-3 rounded bg-light">Année de Creation : {{ $auteur->created_at }}</p>
            <p class="p-3 rounded bg-light">Année de Modification : {{ $auteur->updated_at }}</p>
        </div>
        <div class="d-flex justify-content-around my-4">
            <form method="POST" action="{{ route('auteur.destroy', $auteur) }}"
                onsubmit='return confirm("Voulez-vous supprimer la auteur :\n {{ $auteur->fullName() }}")'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Supprimer </button>
            </form>
            <a class="btn btn-secondary" href="{{ route('auteur.edit', $auteur) }}">Modifier</a>
        </div>
</div>
@stop
