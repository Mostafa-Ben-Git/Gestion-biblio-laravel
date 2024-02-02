@extends('layouts.app')

@section('content')
    <div class="p-4  w-75 mx-auto my-5 rounded">
        @if (session()->has('pass'))
            <div class="alert alert-info">{!! session('pass') !!}</div>
        @endisset
        <div class="w-75 mx-auto">
            <p class="p-3 rounded bg-light">Titre : {{ $livre->titre }}</p>
            <p class="p-3 rounded bg-light">auteur : {{ $livre->auteur->fullName() }}</p>
            <p class="p-3 rounded bg-light">Nombre de Pages : {{ $livre->nbr_page }}</p>
            <p class="p-3 rounded bg-light">Année de publication : {{ $livre->année_de_publication }}</p>
        </div>
        <div class="d-flex justify-content-around my-4">
            <form method="POST" action="{{ route('liver.destroy', $livre) }}"
                onsubmit='return confirm("Voulez-vous supprimer la livre :\n {{ $livre->titre }}")'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Supprimer </button>
            </form>
            <a class="btn btn-secondary" href="{{ route('liver.edit', $livre) }}">Modifier</a>
        </div>
</div>
@stop
