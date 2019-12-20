@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <a href="{{route('quotes.create')}}">
            <button type="button" class="btn btn-primary">Registrar Cotizacion</button>
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
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha de Registro</th>
                <th scope="col">Producto</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($quotes as $quotation)
            <tr>
                <th>{{$quotation->id}}</th>
                <th>{{$quotation->code}}</th>
                <th>{{$quotation->amount}}</th>
                <th>{{$quotation->date_register}}</th>
                <th>{{$quotation->product->name}}</th>
                <td>
                    <a href="{{ route('quotes.edit', $quotation->id) }}">
                        <button type="button" class="btn btn-warning">editar</button>
                    </a>
                    <form action="{{ route('quotes.destroy', $quotation->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(6)}}</h6>
    </div>
@endsection
