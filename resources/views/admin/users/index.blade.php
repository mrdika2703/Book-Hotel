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
                                    <h3 class="card-title">Data Users</h3>
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
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Nama Panggilan</th>
                                        <th>JK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $users)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $users->nama_lengkap }}</td>
                                            <td>{{ $users->username }}</td>
                                            <td><span class="badge 
                                                @if ($users->role == 'tamu') bg-warning
                                                @elseif ($users->role == 'resepsionis') bg-info
                                                @elseif ($users->role == 'admin') bg-primary
                                                @endif
                                                ">{{ $users->role }}
                                                </span></td>
                                            <td>{{ $users->nama_panggilan }}</td>
                                            <td>
                                                @if ($users->jenis_kelamin == 'L')
                                                    Laki-Laki
                                                @elseif ($users->jenis_kelamin == 'P')
                                                    Perempuan
                                                @endif
                                            </td>

                                            <td class="btn-group d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $users->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $users->id }}">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    onclick="confirmDelete({{ $users->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                    <form id="delete-form-{{ $users->id }}"
                                                        action="{{ route('users.destroy', $users->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </button>
                                            </td>
                                        </tr>

                                        @include('admin.users.view', ['users' => $users])
                                        @include('admin.users.edit', ['users' => $users])
                                    @endforeach

                                    @include('admin.users.add', ['users' => $users])
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
