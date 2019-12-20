@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Producto</h2>
                <form method="post" action="{{route('products.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="number" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required minlength="1" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="brand">Codigo de Venta</label>
                        <input type="text" class="form-control" id="sale_code" name="sale_code" required required minlength="1" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Categoria del producto</label>
                        <select class="form-control" id="type_product_id" name="type_product_id" required>

                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Cliente</label>
                        <select class="form-control" id="client_id" name="client_id" required>

                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
