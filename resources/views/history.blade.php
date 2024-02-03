@extends('layouts.app')

@section('content')

    <h1 class="h1">History Of Application</h1>
    <div class="d-flex justify-content-between align-items-center my-3">
        <div class="h6">Voir Votre App History :</div>
    </div>
    @if (session()->has('pass'))
        <div class="alert alert-success">{!! session('pass') !!}</div>
    @endif
    <table class="table table-hover table-bordered table-striped table-dark rounded overflow-hidden">
        <thead>
            <tr>
                <th>ID History</th>
                <th>Action of History</th>
                <th>User Prevented</th>
                <th>Type of Model</th>
                <th>Date of Creation</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($historys as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td class="text-uppercase">{{ $history->action }}</td>
                    <td>{{ $history->user->name }}</td>
                    <td>{{ $history->model_type }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No historys</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        {{ $historys->links() }}
    </div>
@stop
