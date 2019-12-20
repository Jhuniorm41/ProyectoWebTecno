@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th>Codigo</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Fecha Reserva</th>
                <th scope="col">Cliente</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <th>{{$reservation->id}}</th>
                <th>{{$reservation->code}}</th>
                <th>{{$reservation->date_registered}}</th>
                <th>{{$reservation->date_reservation}}</th>
                <th>{{$reservation->client->name}}</th>
                <td>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-primary" value="Atender">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(5)}}</h6>
    </div>
@endsection
