@extends('layout.app')


@section('style')
    <style>
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20rem;
            margin: 10rem 0;
            border-radius: 1rem;
            background-color: rosybrown;
        }
    </style>
@stop

@section('body')
    <div class="hero">
        <h1>Hello To Gestion de Bibliothèque Apps</h1>
    </div>
@stop
