@extends('layouts.app')

@section('content')

    <h1 class="h1">Emprunt</h1>
    <div class="d-flex justify-content-between align-items-center my-3">
        <div class="h6">Manager Votre Emprunts : <b>Number Row: {{ $emprunts->count() }}</b> </div>
        <form method="GET" action="{{ route('emprunt.index', ['date_1' => $date1, 'date_2' => $date2]) }}"
            class="d-flex align-items-center justify-content-between" style="gap: 1rem;">
            <label for="first" style="white-space:nowrap;">Search Date Emprunt Between :</label>
            <input type="date" id="first"
                class="form-control-sm {{ $errors->has('date_1') ? 'border border-3 border-danger' : '' }}" name="date_1"
                value="{{ $date1 ?? old('date_1') }}">
            <span>To</span>
            <input type="date"
                class="form-control-sm {{ $errors->has('date_2') ? 'border border-3 border-danger' : '' }}" name="date_2"
                value="{{ $date2 ?? old('date_2') }}">
            <button class="btn btn-success">Chercher</button>
        </form>
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
            @forelse ($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
                    <td>{{ $emprunt->liver->titre }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_retour }}</td>
                    <td>
                        <a href="{{ route('emprunt.show', $emprunt) }}"class="btn btn-outline-info p-1">Show more</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Emprunts Entre {{ $date1 }} et {{ $date2 }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between">

    </div>
@stop
