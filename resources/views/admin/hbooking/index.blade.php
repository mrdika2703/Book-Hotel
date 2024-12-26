<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:authhName>{{ $authh->nama_lengkap }}</x-slot:authhName>
    <x-slot:authhNim>{{ $authh->role }}</x-slot:authhNim>


    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    showConfirmButton: true,
                });
            });
        </script>
    @endif



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Booking Tamu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tamu</th>
                                        <th>Jenis Kamar</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->people->nama_lengkap }}</td>
                                            <td>{{ $book->kamar->jenis_kamar }}</td>
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

                                            <td class="btn-group d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $book->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @foreach ($booking as $book)
                                <!-- Modal View -->
                                <div class="modal fade" id="viewModal{{ $book->id }}" tabindex="-1"
                                    aria-labelledby="viewModalLabel{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content shadow-lg">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="viewModalLabel{{ $book->id }}">
                                                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data
                                                    Booking
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <th>ID Booking</th>
                                                                    <td>#{{ $book->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>User</th>
                                                                    <td>{{ $book->user->nama_lengkap }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Tamu</th>
                                                                    <td>{{ $book->people->nama_lengkap }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat tamu</th>
                                                                    <td>{{ $book->people->alamat_lengkap }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kamar</th>
                                                                    <td>{{ $book->kamar->jenis_kamar }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Booking</th>
                                                                    <td>{{ $book->tanggal_book }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Check-in</th>
                                                                    <td>{{ $book->tanggal_checkin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Check-out</th>
                                                                    <td>{{ $book->tanggal_checkout }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td> <span class="badge bg-success"> {{ $book->status }} </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pembayaran</th>
                                                                    <td>{{ $book->pembayaran }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>User Accept</th>
                                                                    <td>
                                                                        @if ($book->accuser)
                                                                            {{ $book->accuser->nama_lengkap }} (
                                                                            {{ $book->accuser->role }} )
                                                                        @else
                                                                            Belum
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bi bi-x-circle"></i> Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        {{-- Modal --}}
        <!-- /.modal -->

    </section>

</x-admin.layout>
