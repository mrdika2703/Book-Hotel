<x-admin.layout-r>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:authhName>{{ $authh->nama_lengkap }}</x-slot:authhName>
    <x-slot:authhNim>{{ $authh->role }}</x-slot:authhNim>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Booking</span>
                            <span class="info-box-number">
                                {{ $booking->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-solid fa-bed"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Kamar</span>
                            <span class="info-box-number">
                                {{ $kamar->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-solid fa-hotel"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Fasilitas</span>
                            <span class="info-box-number">
                                {{ $fasilitas->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-solid fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data User</span>
                            <span class="info-box-number">
                                {{ $user->count() }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Booking data bar</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="areaChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Booking data donut</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Booking terbaru</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tamu</th>
                                        <th>Jenis Kamar</th>
                                        <th>Tanggal Book</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking->sortByDesc('tanggal_book')->take(10) as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->people->nama_lengkap }}</td>
                                            <td>{{ $book->kamar->jenis_kamar }}</td>
                                            <td>{{ $book->tanggal_book }}</td>
                                            <td>{{ $book->tanggal_checkin }}</td>
                                            <td>{{ $book->tanggal_checkout }}</td>
                                            <td>
                                                @if ($book->status == 'booking')
                                                    <span class="badge bg-warning">Booking
                                                    @elseif ($book->status == 'checkin')
                                                        <span class="badge bg-info">Checked-in
                                                        @elseif ($book->status == 'checkout')
                                                            <span class="badge bg-success">Checked-out
                                                            @elseif ($book->status == 'cancel')
                                                                <span class="badge bg-danger">Cancelled
                                                @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="/resepsionis/booking" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('/admin/chart-data')
            .then(response => response.json())
            .then(data => {
                var areaChartData = {
                    labels: data.labels,
                    datasets: data.datasets
                };

                var areaChartCanvas = document.getElementById('areaChart').getContext('2d');
                var areaChart = new Chart(areaChartCanvas, {
                    type: 'bar',
                    data: areaChartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false
                    }
                });
            });

        fetch('/admin/doughnut-data')
            .then(response => response.json())
            .then(data => {
                var donutChartCanvas = document.getElementById('donutChart').getContext('2d');
                var donutData = {
                    labels: data.labels,
                    datasets: [{
                        data: data.data,
                        backgroundColor: data.backgroundColor,
                    }]
                };
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                };
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                });
            });
    </script>

</x-admin.layout-r>