@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('reservations.create')}}">
            <button type="button" class="btn btn-primary">Registrar Reserva</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th>Codigo</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Fecha Reserva</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <th>{{$reservation->id}}</th>
                    <th>{{$reservation->code}}</th>
                    <th>{{$reservation->date_registered}}</th>
                    <th>{{$reservation->date_reservation}}</th>
                    <th>Pendiente</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
