<x-home.layout>

    <section class="page-title bg-1 position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.5; background: #004e5a;"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center position-relative" style="z-index: 2;">
                        <span class="text-white d-block"></span>
                        <h1 class="text-capitalize mb-5 text-lg text-white">BookingKu</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5 main-content content-wrapper">
        <!-- Judul dan Tombol -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-cyan fw-bold"><i class="fa-solid fa-bed"></i> History Booking</h3>
        </div>

        <!-- Card Pembungkus Tabel -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table my-bg text-center">
                            <tr>
                                <th>No</th>
                                <th>Kamar</th>
                                <th>Nama</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $book)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $book->kamar->jenis_kamar }}</td>
                                    <td>{{ $book->people->nama_lengkap }}</td>
                                    <td>{{ $book->tanggal_checkin }}</td>
                                    <td>{{ $book->tanggal_checkout }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewModal{{ $book->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" onclick="generatePdfUrl({{ $book->id }})">
                                            <i class="fa-solid fa-print"></i>
                                        </button>
                                        
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal View -->
                                <div class="modal fade" id="viewModal{{ $book->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content shadow-lg">
                                            <div class="modal-header my-bg text-white">
                                                <h5 class="modal-title" id="viewModalLabel{{ $book->id }}">
                                                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data Booking
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Data Pribadi -->
                                                    <div class="col-md-6">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <strong>Nama Lengkap:</strong> <span>{{ $book->people->nama_lengkap }}</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <strong>Jenis Kamar:</strong> <span>{{ $book->kamar->jenis_kamar }}</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <strong>Tanggal Check-in:</strong> <span>{{ $book->tanggal_checkin }}</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <strong>Tanggal Check-out:</strong> <span>{{ $book->tanggal_checkout }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="bi bi-x-circle"></i> Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generatePdfUrl(bookingId) {
            // Template URL dari route
            let urlTemplate = "{{ route('booking.pdf', ':id') }}";
    
            // Ganti placeholder :id dengan bookingId
            let url = urlTemplate.replace(':id', bookingId);
    
            // Redirect ke URL PDF
            window.open(url, '_blank'); // Membuka di tab baru
        }
    </script>

</x-home.layout>
