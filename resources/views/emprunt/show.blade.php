@extends('layout.app')

@section('body')
    <div class="p-4 bg-info w-75 mx-auto my-5 rounded">
        @if (session()->has('pass'))
            <div class="alert alert-success">{!! session('pass') !!}</div>
        @endisset
        <div class="w-75 mx-auto">
            <p class="p-3 rounded bg-light">ID Emprunt : {{ $emprunt->id }}</p>
            <p class="p-3 rounded bg-light">Livre Emprunté : {{ $emprunt->liver->titre }}</p>
            <p class="p-3 rounded bg-light">Date emprunt: {{ $emprunt->date_emprunt }}</p>
            <p class="p-3 rounded bg-light">Date retour: {{ $emprunt->date_retour }}</p>
            <p class="p-3 rounded bg-light">Année de Creation : {{ $emprunt->created_at }}</p>
            <p class="p-3 rounded bg-light">Année de Modification : {{ $emprunt->updated_at }}</p>
        </div>
        <div class="d-flex justify-content-around my-4">
            <form method="POST" action="{{ route('emprunt.destroy', $emprunt) }}"
                onsubmit='return confirm("Voulez-vous supprimer Emprunt :\n {{ $emprunt->id }}")'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer emprunt</button>
            </form>
            <a class="btn btn-secondary" href="{{ route('emprunt.edit', $emprunt) }}">Edit emprunt</a>
        </div>
</div>
@stop
