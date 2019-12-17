@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Cliente</h2>
        <form method="post" action="{{route('clients.update',$client->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}" maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="number" class="form-control" id="nit" name="nit" value="{{$client->nit}}" min="0" max="99999999" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
