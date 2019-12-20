@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('promotions.create')}}">
            <button type="button" class="btn btn-primary">Registrar Promocion</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descuento %</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha de Finalizacion</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promotions as $promotion)
            <tr>
                <th>{{$promotion->id}}</th>
                <th>{{$promotion->name}}</th>
                <th>{{$promotion->discount}}</th>
                <th>{{$promotion->date_start}}</th>
                <th>{{$promotion->date_finish}}</th>
                <td>
                    <a href="{{ route('promotions.edit',$promotion->id) }}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{ route('promotions.destroy',$promotion->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(7)}}</h6>

    </div>
@endsection
