@extends('layouts.layout_admin')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">

                <div class="col-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">Total Event</h4>
                            <h3>{{$events['semua']}}</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-primary" style="width: {{$events['aktif']/$events['semua']*100}}%"></div>
                            </div>
                            <small>{{$events['aktif']}} event aktif</small>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">Konsultan</h4>
                            <h3>{{$konsultans['semua']}}</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-warning" style="width: {{$konsultans['aktif']/$konsultans['semua']*100}}%"></div>
                            </div>
                            <small>{{$konsultans['aktif']}} konsultan aktif</small>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">User</h4>
                            <h3>{{$user}}</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-warning" style="width: {{$user/$user_transaksi*100}}%"></div>
                            </div>
                            <small>{{$user/$user_transaksi*100}}% user melakukan sudah pernah melakukan transaksi</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>	

        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h2 class="fw-bold">Transaksi</h2>
                    <h6></h6>
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let labels = `{{$rentang}}`;
        labels = labels.split(",");

        let datas = `{{$jumlah}}`;
        datas = datas.split(",");

        const data = {
            labels: labels,
            datasets: [{
            label: 'transaksi',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: datas,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
    </script>




@endsection