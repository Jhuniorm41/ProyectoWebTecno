@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Producto</h2>
        <form method="post" action="{{route('products.update',$product->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="number" class="form-control" id="code" name="code" value="{{$product->code}}" required required minlength="1" maxlength="50">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required required minlength="1" maxlength="50">
            </div>
            <div class="form-group">
                <label for="brand">Codigo de Venta</label>
                <input type="text" class="form-control" id="sale_code" name="sale_code" value="{{$product->sale_code}}" required required minlength="1" maxlength="50">
            </div>
            <div class="form-group">
                <label for="telefono">Categoria del producto</label>
                <select class="form-control" id="type_product_id" name="type_product_id" required>
                    <option value="{{$product->type_product->id}}">{{$product->type_product->description}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Cliente">Cliente</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    <option value="{{$product->client_id}}">{{$product->client->name}}</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
