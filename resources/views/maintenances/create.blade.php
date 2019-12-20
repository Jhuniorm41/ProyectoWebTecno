@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Mantenimiento</h2>
                <form method="post" action="{{route('maintenances.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="date">Fecha de Mantenimiento</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="date">Precio</label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="1" max="99999999">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="telefono">Seleccione Cotizacion</label>
                            <select class="form-control" id="quotation_id" name="quotation_id" required>

                                @foreach($quotes as $quotation)
                                    <option value="{{$quotation->id}}">{{$quotation->code}}</option>
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
