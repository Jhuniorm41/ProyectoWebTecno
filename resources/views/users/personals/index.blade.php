@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('personals.create')}}">
            <button type="button" class="btn btn-primary">Registrar Personal</button>
        </a>
        <br>
        <script type="javascript">
            $(document).ready(function() {
                $('#example1').DataTable();
            } );
        </script>
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th class="th-sm">Id</th>
                <th class="th-sm">Nombre Completo</th>
                <th class="th-sm">Fecha de Ingreso</th>
                <th class="th-sm">Cargo</th>
                <th class="th-sm">C.I.</th>
                <th class="th-sm">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($personals as $personal)
            <tr>
                <td>{{$personal->id}}</td>
                <td>{{$personal->name}}</td>
                <td>{{$personal->date_admission}}</td>
                <td>{{$personal->position}}</td>
                <td>{{$personal->ci}}</td>
                <td>
                    <a href="{{route('personals.edit',$personal->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{route('personals.destroy',$personal->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h6>{{Auth()->user()->showCounter(1)}}</h6>
    </div>
@endsection
