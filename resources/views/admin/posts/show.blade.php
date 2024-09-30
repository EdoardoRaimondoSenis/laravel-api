@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
            
        <h1>Dettagli Post</h1>
        <ul>
            <li>Titolo: {{ $post->title }}</li>
            <li>Tipo: {{ $post->type ? $post->type->name : 'Nessuna Tipo'}}</li>
            <li>Tecnologie: 
            <ul>
                @forelse ($post->technologies as $technology)
                    <li class="badge text-bg-warning">{{ $technology->name }}</li>
                @empty
                    <li>Nessuna Tecnologia</li>
                @endforelse
            </ul>
            <li>Data di Inizio: {{ $post->start_date }}</li>
            <li>Data di Fine: {{ $post->end_date }}</li>
            <li>Collaboratori: {{ $post->collaborators }}</li>
            <li>Argomento: {{ $post->argument }}</li>
        </ul>
        <div class="container mb-5">
            <img src="{{ asset('storage/' . $post->path_image) }}" alt="{{ $post->image_original_name }}" class="img-fluid" onerror="this.src='/img/no-image.jpg'">
        </div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Torna alla lista</a>
    </div>
@endsection