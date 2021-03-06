@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('products.create')}}">
            <button type="button" class="btn btn-primary">Registrar Producto</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">nombre</th>
                <th scope="col">Codigo</th>
                <th scope="col">Codigo de Venta</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <th>{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->code}}</th>
                <th>{{$product->sale_code}}</th>
                <th>{{$product->type_product->description}}</th>
                <td>
                    <a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{route('products.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                    <a href="{{route('products.reporte_reparaciones',$product->id)}}"><button type="button" class="btn btn-danger">Reporte Reparaciones</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(2)}}</h6>
    </div>
@endsection
