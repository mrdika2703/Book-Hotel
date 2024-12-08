<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:authhName>{{ $authh->nama_lengkap }}</x-slot:authhName>
    <x-slot:authhNim>{{ $authh->role }}</x-slot:authhNim>


    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
        document.addEventListener('DOMContentLoaded', function () {
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
                            <h3 class="card-title">DataTable with default features</h3>
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
                                            <td> <span class="badge bg-info">{{ $book->status }}</span></td>

                                            <td class="btn-group d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $book->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-toggle="modal" data-target="#modal-edit">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
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
                                                            <!-- Data Pribadi -->
                                                            <div class="col-md-6">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <strong>Nama Lengkap:</strong>
                                                                        <span>{{ $book->people->nama_lengkap }}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong>Jenis Kamar:</strong>
                                                                        <span>{{ $book->kamar->jenis_kamar }}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong>Tanggal Check-in:</strong>
                                                                        <span>{{ $book->tanggal_checkin }}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong>Tanggal Check-out:</strong>
                                                                        <span>{{ $book->tanggal_checkout }}</span>
                                                                    </li>
                                                                </ul>
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

                                        <!-- Modal Edit -->
                                        <!-- /.modal -->

                                        <div class="modal fade" id="modal-edit">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Booking</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('booking.checkin', $book->id) }}" method="POST">
                                                          @csrf
                                                          @method('PATCH')
                                                          <button type="submit" class="btn btn-warning">Check-in</button>
                                                      </form>
                                                      <form action="{{ route('booking.checkout', $book->id) }}" method="POST">
                                                          @csrf
                                                          @method('PATCH')
                                                          <button type="submit" class="btn btn-success">Check-out</button>
                                                      </form>
                                                      <form action="{{ route('booking.cancel', $book->id) }}" method="POST">
                                                          @csrf
                                                          @method('PATCH')
                                                          <button type="submit" class="btn btn-danger">Cancel</button>
                                                      </form>
                                                  </div>
                                                  

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tamu</th>
                                        <th>Jenis Kamar</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteForms = document.querySelectorAll('.delete-form');

                deleteForms.forEach(form => {
                    const deleteButton = form.querySelector('.btn-delete');

                    deleteButton.addEventListener('click', function(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak akan bisa mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>

    </section>

</x-admin.layout>
