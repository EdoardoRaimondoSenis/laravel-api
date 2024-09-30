@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-5">Elenco Tipo</h1>
        
        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong> è stato eliminato correttamente.
            </div>
        @endif

        <form class="d-flex justify-content-between mt-5" action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nuovo Tipo" class="form-control me-3">
            <button type="submit" class="btn btn-success">Invia</button>
        </form>
        <table class="table">
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>
                            <form action="{{ route('admin.types.update', $type) }}" method="PUT">
                                @csrf
                                @method('PUT')
                                <span>{{ $type->name }}</span>
                            </form>
                        </td>
                        <td></td>
                        <td>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
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