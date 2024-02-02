@extends('layouts.app')

@section('content')

    <h1 class="h1">Livres</h1>
    <div class="d-flex justify-content-between my-3">
        <p>Manager Votre Livres</p>
        <a href="{{ route('liver.create') }}" class="btn btn-primary">Ajouter le livre</a>
    </div>
    @if (session()->has('pass'))
        <div class="alert alert-success">{!! session('pass') !!}</div>
    @endif
    <table class="table table-hover table-bordered table-striped table rounded overflow-hidden">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
                <tr>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->auteur->fullName() }}</td>
                    <td>
                        <a href="{{ route('liver.show', $livre) }}"class="btn btn-primary p-1">Show more</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $livres->links() }}
@stop
