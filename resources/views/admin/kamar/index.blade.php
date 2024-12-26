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
                                    <h3 class="card-title">Data Kamar</h3>
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
                                        <th>Jenis Kamar</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Fasilitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kamar as $kamar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kamar->jenis_kamar }}</td>
                                            <td>{{ $kamar->jumlah_kamar }}</td>
                                            <td>Rp. {{ number_format($kamar->harga_kamar, 0, ',', '.') }}</td>
                                            <td>{{ $kamar->fasilitas }}</td>

                                            <td class="btn-group d-flex justify-content-center">
                                                @if (isset($kamar) && is_object($kamar))
                                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $kamar->id }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $kamar->id }}">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        onclick="confirmDelete({{ $kamar->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <form id="delete-form-{{ $kamar->id }}"
                                                            action="{{ route('kamar.destroy', $kamar->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        
                                        @include('admin.kamar.view', ['kamar' => $kamar])
                                        @include('admin.kamar.edit', ['kamar' => $kamar])
                                        
                                    @endforeach

                                        @include('admin.kamar.add', ['kamar' => $kamar])
                                         
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
        // document.addEventListener('DOMContentLoaded', function() {
        //     @if (session('success'))
        //         Swal.fire({
        //             icon: 'success',
        //             title: 'Berhasil',
        //             text: '{{ session('success') }}',
        //             timer: 2000,
        //             showConfirmButton: false
        //         });
        //     @endif
        // });

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
