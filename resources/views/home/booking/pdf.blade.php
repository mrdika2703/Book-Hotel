<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pemesanan</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Uncomment if you want to print immediately on load
            // window.print();
        });
    </script>
    <style>
        /* Reset */
        body {
            margin: 0;
            font-family: "Roboto", sans-serif;
            color: #212529;
            background-color: #fff;
        }

        .box {
            float: left;
        }

        .box2 {
            float: right;
            text-align: right
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
            /* Setiap kolom akan membagi ruang yang ada secara merata */
            padding: 0 15px;
            /* Sesuaikan padding di sisi kiri dan kanan */
            box-sizing: border-box;
            /* Pastikan padding tidak memengaruhi ukuran */
        }


        .col-6 {
            flex: 0 0 50%;
            /* Lebar 50% */
            max-width: 50%;
        }

        .col-4 {
            flex: 0 0 33.333%;
            /* Lebar 33.333% */
            max-width: 33.333%;
        }

        .col-3 {
            flex: 0 0 25%;
            /* Lebar 25% */
            max-width: 25%;
        }



        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding: 15px;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .text-start {
            text-align: left !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }


        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        th,
        td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        /* Header */
        header {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #dee2e6;
        }

        header .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header img {
            max-width: 100px;
            border-radius: 50%;
        }

        header h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        header p {
            margin: 0;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Notices */
        .notices {
            padding: 10px;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .notice {
            font-weight: bold;
            color: #495057;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .border {
            border: 1px solid #dee2e6 !important;
        }

        .rounded {
            border-radius: 0.25rem !important;
        }
    </style>

</head>

<body>
    <div id="invoice" class="container">
        <header>
            <div class="row">
                <div class="text-center">
                    <img src="{{ public_path('images/logo.png') }}" class="rounded-circle" alt="Hotel Logo" width="100"
                        height="100">
                </div>
                <div class="col-10 text-center">
                    <h2>Booking Hotel</h2>
                    <p>Mojoagung Jombang, 61482</p>
                    <p>087761811187 | hoteldk@gmail.com</p>
                </div>
            </div>
            <hr>
        </header>

        <main>
            <div class="clearfix">
                <div class="box">
                    <h3>Data Pemesan :</h3>
                    <h5><b>Nama :</b> {{ $booking->people->nama_lengkap }}</h5> {{-- people --}}
                    <h5><b>Email :</b> {{ $booking->user->email }}</h5> {{-- user email --}}
                    <h5><b>No Telepon :</b> {{ $booking->user->no_telepon }}</h5> {{-- user email --}}
                    <h5><b>Alamat :</b> {{ $booking->people->alamat_lengkap }}</h5> {{-- people --}}
                </div>
                <div class="box2">
                    <h3>Detail Pemesanan :</h3>
                    <h5><b>ID Pemesanan :</b> #{{ $booking->id }}</h5> {{-- booking ID --}}
                    <h5><b>Tanggal :</b> {{ $booking->tanggal_book->format('d-m-Y H:i:s') }}</h5> {{-- booking date --}}
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kamar</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="font-size: small">
                        <td>#{{ $booking->id }}</td> {{-- booking ID --}}
                        <td>{{ $booking->kamar->jenis_kamar }}</td> {{-- kamar name --}}
                        <td>{{ $booking->tanggal_checkin->format('d-m-Y H:i:s') }}</td> {{-- check-in date --}}
                        <td>{{ $booking->tanggal_checkout->format('d-m-Y H:i:s') }}</td> {{-- check-out date --}}
                        <td><b>{{ $booking->status }}</b></td> {{-- booking status --}}
                        <td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td> {{-- total price --}}
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

</body>


</html>
