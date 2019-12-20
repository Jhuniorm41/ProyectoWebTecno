@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Cotizacion</h2>
                <form method="post" action="{{route('quotes.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="date">Codigo</label>
                            <input type="text" class="form-control" id="code" name="code"  value="{{Auth()->user()->getStrRandom()}}" readonly required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="producto">Reserva</label>
                            <select class="form-control" id="reservation_id" name="reservation_id">
                                <option value=""></option>
                                @foreach($reservations as $reservation)
                                    <option value="{{$reservation->id}}">{{$reservation->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
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
