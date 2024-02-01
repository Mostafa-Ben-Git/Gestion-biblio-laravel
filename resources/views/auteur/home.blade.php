@extends('layouts.app')

@section('content')

    <h1 class="h1">Auteurs</h1>
    <div class="d-flex justify-content-between my-3">
        <p>Manager Votre Acteurs</p>
        <a href="{{ route('auteur.create') }}" class="btn btn-primary">Ajouter nouveau auteur</a>
    </div>
    @if (session()->has('pass'))
        <div class="alert alert-success">{!! session('pass') !!}</div>
    @endif
    <table class="table table-hover table-bordered table-striped table-dark rounded overflow-hidden">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->id }}</td>
                    <td>{{ $auteur->nom }}</td>
                    <td>{{ $auteur->prenom }}</td>
                    <td>
                        <a href="{{ route('auteur.show', $auteur) }}"class="btn btn-outline-info p-1">Show more</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $auteurs->links() }}
@stop
