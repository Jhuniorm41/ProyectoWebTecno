@extends('layout.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js">
    <div class="container">
            <h3>Cantidad de Productos por Tipo de producto</h3>
            <br>
            <div class="row">
                <canvas id="myChart" width="100%" height="50px"></canvas>
            </div>
        <br><br>
        <h3>Cantidad de Reservas por Cliente</h3>
        <br>
        <div class="row">
            <canvas id="myChart1" width="100%" height="50px"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart');
        var data = {
            datasets: [{
                data: {!! $data1 !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 3
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels:
                {!! $labels1 !!}

        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: Chart.defaults.Pie
        });





        var ctx = document.getElementById('myChart1');
        var data = {
            datasets: [{
                data: {!! $data2 !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 3
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels:
            {!! $labels2 !!}

        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: Chart.defaults.Pie
        });
    </script>
@endsection
