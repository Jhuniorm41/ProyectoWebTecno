@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Garantia</h2>
        <form method="post" action="{{route('maintenances.update',$maintenance->id)}}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">Fecha de Mantenimiento</label>
                    <input type="date" class="form-control" id="date" name="date" required value="{{$maintenance->date}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">Precio</label>
                    <input type="number" class="form-control" id="amount" name="amount" required value="{{$maintenance->amount}}" min="1" max="99999">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
