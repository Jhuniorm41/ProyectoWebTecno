@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Reserva</h2>
                <form method="post" action="{{route('reservations.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="date">Codigo</label>
                            <input type="text" class="form-control" id="code" name="code" required value="{{auth()->user()->getStrRandom()}}" min="5" max="10" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="date">Fecha de Reserva</label>
                            <input type="date" class="form-control" id="date_reservation" name="date_reservation" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
