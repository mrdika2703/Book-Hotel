<!DOCTYPE html>
<html>

<head>
    <title>Booking PDF</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style_bukti_pesan.css') }}">
</head>

<body>
    <div id="invoice">

        <div class="toolbar hidden-print">
            <div class="text-right">
                <a href="index.php?" class="btn btn-warning"><i class="fa fa-print"></i>Kembali</a>
                <button id="printInvoice" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Print as PDF</button>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <a target="_blank" href="">
                            <img src="image/hotel.png" class="rounded-circle" alt="" width="100" height="100">
                                </a>
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <a target="_blank" href="index.php">
                                <b>Booking Hotel</b>
                                </a>
                            </h2>
                            <div>Mojoagung Jombang, 61482, INA</div>
                            <div>087761811187</div>
                            <div>hoteldk@gmail.com</div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <h2 class="to"> {{ $booking->user->nama_lengkap }} </h2>
                            <p class="to"> {{ $booking->user->nama_lengkap }} </p>
                            <div class="address">Mojoagung Jombang, 61482, Indonesia</div>
                            <div class="email"><a href="mailto:{{ $booking->user->nama_lengkap }} ">{{ $booking->user->nama_lengkap }}</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">Pemesanan</h1>
                            <div class="date">Date: {{ $booking->user->nama_lengkap }}</div>
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left"> KAMAR</th>
                                <th class="text-center">CHEECK IN</th>
                                <th class="text-center">CHECK OUT</th>
                                <th class="text-center">JUMLAH KAMAR</th>
                                <th class="text-center">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="no">01</td>
                                <td class="text-left"><h2>
                                    {{ $booking->user->nama_lengkap }}
                                    </a>
                                    </h2>
                                    {{ $booking->user->nama_lengkap }}
                                   </a> 
                                </td>
                                <td class="unit text-center">{{ $booking->user->nama_lengkap }}</td>
                                <td class="qty text-center">{{ $booking->user->nama_lengkap }}</td>
                                <td class="unit text-center">{{ $booking->user->nama_lengkap }} </td>
                                <td class="total text-center">{{ $booking->user->nama_lengkap }} </td>
                            </tr>                    
                        </tfoot>
                    </table>
                    <div class="mt-4 mb-2">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">Pastikan berada di hotel kami 30 menit sebelum check in.</div>
                    </div>
                </main>
                <footer>
                    Bukti pemesanan kamar {{ $booking->user->nama_lengkap }} Mojoagung - Jombang - Indonesia.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

{{-- <body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1 class="fw-bold">Detail Booking</h1>
            <p class="text-muted">Informasi booking kamar hotel</p>
        </div>

        <!-- Informasi Booking -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Nama Tamu</strong></td>
                    <td>{{ $booking->user->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td><strong>Kamar</strong></td>
                    <td>{{ $booking->kamar->jenis_kamar }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Check-in</strong></td>
                    <td>{{ $booking->tanggal_checkin }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Check-out</strong></td>
                    <td>{{ $booking->tanggal_checkout }}</td>
                </tr>
                <tr>
                    <td><strong>Total Harga</strong></td>
                    <td>Rp{{ number_format($booking->total_harga, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td>{{ $booking->status }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Hotel Booking System. All rights reserved.</p>
        </div>
    </div>
</body> --}}

</html>



<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pemesanan</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Uncomment if you want to print immediately on load
            // window.print();
        });
    </script>
    <style>
        /* Salin CSS Bootstrap dari CDN */
        @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet');

        @import url("{{ asset('css/style_bukti_pesan.css') }}");

        /* Tambahkan beberapa gaya tambahan jika perlu */
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>
    <div id="invoice" class="container">
        <header>
            <div class="row">
                <div class="col-2">
                    <img src="image/hotel.png" class="rounded-circle" alt="Hotel Logo" width="100" height="100">
                </div>
                <div class="col-10 text-end">
                    <h2>Booking Hotel</h2>
                    <p>Mojoagung Jombang, 61482, INA</p>
                    <p>087761811187 | hoteldk@gmail.com</p>
                </div>
            </div>
            <hr>
        </header>

        <main>
            <div class="row">
                <div class="col">
                    <h5>Data Pemesan:</h5>
                    <p><b>Nama:</b> {{ $booking->user->nama_lengkap }}</p>
                    <p><b>Email:</b> {{ $booking->user->nama_lengkap }}</p>
                    <p><b>Alamat:</b> Mojoagung Jombang, Indonesia</p>
                </div>
                <div class="col text-end">
                    <h5>Detail Pemesanan:</h5>
                    <p><b>ID Pemesanan:</b> #{{ $booking->user->nama_lengkap }}</p>
                    <p><b>Tanggal:</b> {{ $booking->user->nama_lengkap }}</p>
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kamar</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Jumlah Kamar</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $booking->user->nama_lengkap }}</td>
                        <td>{{ $booking->user->nama_lengkap }}</td>
                        <td>{{ $booking->user->nama_lengkap }}</td>
                        <td>{{ $booking->user->nama_lengkap }}</td>
                        <td>Rp {{ $booking->user->nama_lengkap }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <p><b>Catatan:</b> Pastikan berada di hotel 30 menit sebelum waktu check-in.</p>
            </div>
        </main>

        <footer class="text-center mt-4">
            <p>Bukti pemesanan ini harus dibawa saat check-in.</p>
            <p>&copy; 2024 Booking Hotel. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
