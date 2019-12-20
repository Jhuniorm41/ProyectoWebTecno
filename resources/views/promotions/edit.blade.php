@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Editar Venta</h2>
                <form method="post" action="{{route('promotions.update', $promotion->id)}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="code">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" min="1" max="30" required value="{{$promotion->name}}">
                    </div>
                    <div class="form-group">
                        <label for="code">Descuento</label>
                        <input type="number" class="form-control" id="discount" name="discount" min="1" max="99" value="{{$promotion->discount}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha Inicio</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" value="{{$promotion->date_start}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha Finalizacion</label>
                        <input type="date" class="form-control" id="date_finish" name="date_finish" value="{{$promotion->date_finish}}" required>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Tipo de Servicio</label>
                        <select class="form-control" id="type_service_id" name="type_service_id" required>
                            <option value="{{$promotion->type_service->id}}">{{$promotion->type_service->description}}</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Tipo de Producto</label>
                        <select class="form-control" id="type_product_id" name="type_product_id" required>
                            <option value="{{$promotion->type_product->id}}">{{$promotion->type_product->description}}</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">editar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
