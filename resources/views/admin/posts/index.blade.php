@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-5">Elenco Posts</h1>
        
        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong> è stato eliminato correttamente.
            </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Argomento</th>
                <th scope="col">Data di inizio</th>
                <th scope="col">Data di fine</th>
                <th scope="col">Collaboratori</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tecnologie</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->argument }}</td>
                    <td>{{ $post->start_date }}</td>
                    <td>{{ $post->end_date }}</td>
                    <td>{{ $post->collaborators }}</td>
                    <td>
                        @forelse ($post->technologies as $technology)
                        <span class="badge text-bg-warning">
                            {{ $technology->name }}
                        </span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td><span class="badge text-bg-success">{{ $post->type ? $post->type->name : 'Nessun Tipo'}}</span></td>
                    <td>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-secondary">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Elimina" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection