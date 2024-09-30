@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h1>Modifica il post {{ $post->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label class="form-label" for="title">Titolo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
    @error('title')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="type">Tipo</label>
        <select class="form-select" aria-label="Default select example" name="type" id="type">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label class="form-label mt-4" for="technology">Tecnologia</label><br>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology)
                <input 
                type="checkbox" 
                class="btn-check" 
                id="technology-{{ $technology->id }}" 
                name="technologies[]" 
                value="{{ $technology->id }}" 
                autocomplete="off"
                @if ($errors->any() && in_array($technology->id, old('technologies', [])) 
                        || 
                    !$errors->any() && $post->technologies->contains($technology))
                    checked
                @endif>
                <label class="btn btn-outline-primary" for="btncheck{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach
        </div><br>

    <label class="form-label" for="start_date">Data di inizio</label>
    <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('start_date', $post->start_date) }}" required>
    @error('start_date')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="end_date">Data di fine</label>
    <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('end_date', $post->end_date) }}" required>
    @error('end_date')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="collaborators">Collaboratori:</label>
    <input class="form-control" type="text" name="collaborators" id="collaborators" value="{{ old('collaborators', $post->collaborators) }}">
    @error('collaborators')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="formlabel" for="argument">Argomento</label>
    <textarea cols="30" rows="6" class="form-control" name="argument" id="argument" required>{{ old('argument', $post->argument) }}</textarea>
    @error('argument')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary mt-3">Salva</button>
</form>
</div>
@endsection