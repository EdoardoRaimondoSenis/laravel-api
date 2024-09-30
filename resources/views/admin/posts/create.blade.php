@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Crea un nuovo post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="title">Titolo</label>
        <input class="form-control" type="text" name="title" id="title" required>
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
                @if (is_array('technologies') && in_array($technology, old('technologies')))
                    checked
                @endif>
                <label class="btn btn-outline-primary" for="btncheck{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach
        </div><br>
    
        <label class="form-label mt-3" for="start_date">Data di inizio</label>
        <input class="form-control" type="date" name="start_date" id="start_date" required>
        @error('start_date')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror
    
        <label class="form-label" for="end_date">Data di fine</label>
        <input class="form-control" type="date" name="end_date" id="end_date" required>
        @error('end_date')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror
    
        <label class="form-label" for="collaborators">Collaboratori:</label>
        <input class="form-control" type="text" name="collaborators" id="collaborators">
        @error('collaborators')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror

        <label class="form-label" for="image">Immagine:</label>
        <input class="form-control" type="file" name="image" id="image">
        @error('image')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror

        <label class="formlabel" for="argument">Argomento</label>
        <textarea cols="30" rows="6" class="form-control" name="argument" id="argument" required></textarea>
        @error('argument')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
    </div>
@endsection