@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('admin.posts.index') }}">Lista Post</a></li>
            <li class="list-group-item"><a href="{{ route('admin.posts.index') }}">Lista Tipi</a></li>
            <li class="list-group-item"><a href="{{ route('admin.posts.index') }}">Lista Tecnologie</a></li>
            <li class="list-group-item"><a href="{{ route('admin.posts.create') }}">Crea</a></li>
            <li class="list-group-item"><a href="{{ route('admin.typePosts') }}">Post raggruppato in tipo</a></li>
            <li class="list-group-item"><a href="{{ route('admin.types.index') }}">Gestione tipo</a></li>
        </ul>
    </body>
    </html>
@endsection