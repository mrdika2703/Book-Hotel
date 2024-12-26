<!-- Modal View -->
<div class="modal fade" id="viewModal{{ $users->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $users->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel{{ $users->id }}">
                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data Users
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <!-- Data Pribadi -->
                    <div class="row mb-3">
                        <div class="col">
                            <strong>ID :</strong>
                        </div>
                        <div class="col">
                            <span>#{{ $users->id }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Username :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $users->username }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Password :</strong>
                        </div>
                        <div class="col">
                            <span class="text-wrap">{{ $users->password }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Role :</strong>
                        </div>
                        <div class="col">
                            <span
                                class="badge 
                                                @if ($users->role == 'tamu') bg-warning
                                                @elseif ($users->role == 'resepsionis') bg-info
                                                @elseif ($users->role == 'admin') bg-primary @endif
                                                ">{{ $users->role }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Nama Lengkap :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $users->nama_lengkap }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Nama Panggilan :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $users->nama_panggilan }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Jenis Kelamin :</strong>
                        </div>
                        <div class="col">
                            <span>
                                @if ($users->jenis_kelamin == 'L')
                                    Laki-Laki
                                @elseif ($users->jenis_kelamin == 'P')
                                    Perempuan
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Email :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $users->email }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>No Telepon :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $users->no_telepon }}</span>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 1 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people1 != null)
                                <span>{{ $users->people1->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 2 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people2 != null)
                                <span>{{ $users->people2->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 3 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people3 != null)
                                <span>{{ $users->people3->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 4 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people4 != null)
                                <span>{{ $users->people4->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 5 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people5 != null)
                                <span>{{ $users->people5->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 6 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people6 != null)
                                <span>{{ $users->people6->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 7 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people7 != null)
                                <span>{{ $users->people7->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 8 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people8 != null)
                                <span>{{ $users->people8->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 9 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people9 != null)
                                <span>{{ $users->people9->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <strong>Orang 10 :</strong>
                        </div>
                        <div class="col">
                            @if ($users->add_people10 != null)
                                <span>{{ $users->people10->nama_lengkap }}</span>
                            @else
                                Belum diisi
                            @endif
                        </div>
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
