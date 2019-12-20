@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Añadir Detalles de Cotizacion</h2>
                <br>
                <form method="post" action="{{route('quotesdetail.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <input type="hidden" class="form-control" id="quotation_id" name="quotation_id"
                                   value="{{$quotation->id}}" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{$i=0}}">
                            @foreach($type_services as $type_service)
                                <h5>{{$type_service->description}}</h5>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$type_service->id}}"
                                           name="type_service_id{{$i}}">
                                    <br>
                                </div>
                                <input type="number" class="form-control"name="subtotal{{$i}}" min="1" max="9999999">
                                <br>
                                <input type="hidden" value="{{$i++}}">

                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
