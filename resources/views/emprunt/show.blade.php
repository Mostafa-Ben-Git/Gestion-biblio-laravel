@extends('layouts.app')

@section('content')
    <div class="p-4  w-75 mx-auto my-3 rounded">
        @if (session()->has('pass'))
            <div class="alert alert-success">{!! session('pass') !!}</div>
        @endisset

        <div class="mx-auto row">
            <div class="col col-lg-12">
                <h2 class="p-3 rounded col-lg-12">ID Emprunt : {{ $emprunt->id }}</h2>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Livre Emprunté : {{ $emprunt->liver->titre }}</p>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Auteur Livre: {{ $emprunt->liver->auteur->fullName() }}</p>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Date emprunt: {{ $emprunt->date_emprunt }}</p>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Date retour: {{ $emprunt->date_retour }}</p>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Année de Creation : {{ $emprunt->created_at }}</p>
            </div>
            <div class="col col-lg-6 p-3">
                <p class="p-3 rounded ">Année de Modification : {{ $emprunt->updated_at }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-around my-4">
            <form method="POST" action="{{ route('emprunt.destroy', $emprunt) }}"
                onsubmit='return confirm("Voulez-vous supprimer Emprunt :\n {{ $emprunt->id }}")'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Supprimer</button>
            </form>
            <a class="btn btn-secondary" href="{{ route('emprunt.edit', $emprunt) }}">Modifier</a>
        </div>
</div>
@stop
