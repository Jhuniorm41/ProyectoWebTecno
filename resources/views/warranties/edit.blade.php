@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Garantia</h2>
        <form method="post" action="{{route('warranties.update',$warranty->id)}}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">Fecha de Ampliacion</label>
                    <input type="date" class="form-control" id="date_extension" name="date_extension" value="{{$warranty->date_extension}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
