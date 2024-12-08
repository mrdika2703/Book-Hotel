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
                                    <button class="btn btn-primary">Tambah Data</button>
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
                                            <td>{{ $users->nama_lengkap}}</td>
                                            <td>{{ $users->username}}</td>
                                            <td>{{ $users->role}}</td>
                                            <td>{{ $users->nama_panggilan}}</td>
                                            <td>{{ $users->jenis_kelamin}}</td>

                                            <td class="btn-group d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $users->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $users->id }}">
                                                    <i class="fa-solid fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal{{ $users->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal View -->
                                        <div class="modal fade" id="viewModal{{ $users->id }}" tabindex="-1"
                                            aria-labelledby="viewModalLabel{{ $users->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content shadow-lg">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $users->id }}">
                                                            <i class="bi bi-person-lines-fill me-2"></i>Detail Data
                                                            Booking
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <!-- Data Pribadi -->
                                                            <div class="col">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <strong>Nama Lengkap:</strong>
                                                                        <span>{{ $users->nama_lengkap }}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <strong>Password:</strong>
                                                                        <span>{{ $users->password }}</span>
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
                                    @endforeach
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
</x-admin.layout>