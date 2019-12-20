@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Cotizacion</h2>
        <form method="post" action="{{route('quotes.update',$quotation->id)}}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">Monto</label>
                    <input type="number" step="any" class="form-control" id="amount" name="amount" value="{{$quotation->amount}}" required min="1" max="9999999">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
