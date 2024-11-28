<!DOCTYPE html>
<html>

<head>
    <title>Booking PDF</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
    <style>
        /* Salin CSS Bootstrap dari CDN */
        @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

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
</body>

</html>
