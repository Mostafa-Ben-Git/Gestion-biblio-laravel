@extends('layout.app')

@section('body')

    <h1 class="h1">Emprunt</h1>
    <div class="d-flex justify-content-between my-3">
        <p>Manager Votre Emprunts</p>
        <a href="{{ route('emprunt.create') }}" class="btn btn-primary">Ajouter nouveau emprunt</a>
    </div>
    @if (session()->has('pass'))
        <div class="alert alert-success">{!! session('pass') !!}</div>
    @endif
    <table class="table table-hover table-bordered table-striped table-dark rounded overflow-hidden">
        <thead>
            <tr>
                <th>ID Emprunt</th>
                <th>Livre Emprunté</th>
                <th>Date emprunt</th>
                <th>Date retour</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
                    <td>{{ $emprunt->liver->titre }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_retour }}</td>
                    <td>
                        <a href="{{ route('emprunt.show', $emprunt) }}"class="btn btn-outline-info p-1">Show more</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $emprunts->links() }}
@stop
