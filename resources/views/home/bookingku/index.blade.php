<x-home.layout>

    <section class="page-title bg-1 position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.5; background: #004e5a;"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center position-relative" style="z-index: 2;">
                        <span class="text-white d-block"></span>
                        <h1 class="text-capitalize mb-5 text-lg text-white">BookingKu</h1>

                        <!-- Breadcrumb -->
                        <!-- Uncomment jika diperlukan -->
                        <!--
                        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5 main-content content-wrapper">
        <!-- Judul dan Tombol -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary fw-bold">📋 Data Orang</h3>
            <button class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </button>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $person)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>as</td>
                                    <td>asas</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $booking->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $person->id }}">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>




</x-home.layout>
