@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('maintenances.create')}}">
            <button type="button" class="btn btn-primary">Registrar Mantenimiento</button>
        </a>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Codigo de Cotizacion</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($maintenances as $maintenance)
                <tr>
                    <th>{{$maintenance->id}}</th>
                    <th>{{$maintenance->amount}}</th>
                    <th>{{$maintenance->date}}</th>
                    <th>{{$maintenance->quotation->code}}</th>
                    <td>
                        <a href="{{route('maintenances.edit',$maintenance->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                        <form action="{{route('maintenances.destroy',$maintenance->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(3)}}</h6>
    </div>
@endsection
