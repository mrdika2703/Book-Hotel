<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:authhName>{{ $authh->nama_lengkap }}</x-slot:authhName>
    <x-slot:authhNim>{{ $authh->role }}</x-slot:authhNim>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <h3 class="card-title">Data Fasilitas</h3>  
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addModal">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Fasilitas</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotel as $hotel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hotel->nama_fasilitas }}</td>
                                            <td>{{ $hotel->deskripsi_fasilitas }}</td>

                                            <td class="btn-group d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $hotel->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $hotel->id }}">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        onclick="confirmDelete({{ $hotel->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <form id="delete-form-{{ $hotel->id }}"
                                                            action="{{ route('hotel.destroy', $hotel->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </button>
                                            </td>
                                        </tr>

                                        @include('admin.hotel.view', ['hotel' => $hotel])
                                        @include('admin.hotel.edit', ['hotel' => $hotel])

                                    @endforeach

                                        @include('admin.hotel.add', ['hotel' => $hotel])
                                </tbody>
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

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif
        });
    </script>
</x-admin.layout>