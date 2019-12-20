@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Promocion</h2>
                <form method="post" action="{{route('promotions.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="code">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" min="1" max="30" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Descuento</label>
                        <input type="number" class="form-control" id="discount" name="discount" min="1" max="99" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha Inicio</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha Finalizacion</label>
                        <input type="date" class="form-control" id="date_finish" name="date_finish" required>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Tipo de Servicio</label>
                        <select class="form-control" id="type_service_id" name="type_service_id" required>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Tipo de Producto</label>
                        <select class="form-control" id="type_product_id" name="type_product_id" required>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
