@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Garantia</h2>
                <form method="post" action="{{route('warranties.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="date">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="date_start" name="date_start" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="description">Fecha de Finalizacion</label>
                            <input type="date" class="form-control" id="date_finish" name="date_finish" required>
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <select class="form-control" id="product_id" name="product_id" required>

                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
