@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Cliente</h2>
                <form method="post" action="{{route('clients.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">NIT</label>
                        <input type="number" class="form-control" id="nit" name="nit" min="0" max="99999999" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection
