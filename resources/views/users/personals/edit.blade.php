@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Personal</h2>
        <form method="post" action="{{route('personals.update',$personal->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$personal->name}}" required minlength="1" maxlength="50">
            </div>
            <div class="form-group">
                    <label for="Cargo">Cargo</label>
                <input type="text" class="form-control" id="position" name="position" value="{{$personal->position}}" required minlength="1" maxlength="50">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Admision</label>
                <input type="date" class="form-control" id="date_admission" name="date_admission" value="{{$personal->date_admission}}" required>
            </div>
            <div class="form-group">
                <label for="CI">CI</label>
                <input type="number" class="form-control" id="ci" name="ci" value="{{$personal->ci}}" required min="1" max="999999999">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
