@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('warranties.create')}}">
            <button type="button" class="btn btn-primary">Registrar Garantia</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Finalizacion</th>
                <th scope="col">Fecha de ampliacion</th>
                <th scope="col">Cod. Producto</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($warranties as $warranty)
            <tr>
                <th>{{$warranty->id}}</th>
                <th>{{$warranty->date_start}}</th>
                <th>{{$warranty->date_finish}}</th>
                <th>{{$warranty->date_extension}}</th>
                <th>{{$warranty->product->code}}</th>
                <td>
                    <a href="{{ route('warranties.edit', $warranty->id) }}">
                        <button type="button" class="btn btn-warning">editar</button>
                    </a>
                    <form action="{{ route('warranties.destroy', $warranty->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(4)}}</h6>
    </div>
@endsection
