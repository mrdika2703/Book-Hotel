<div class="modal fade" id="viewModal{{ $person->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $person->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel{{ $person->id }}">
                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <!-- Data Pribadi -->
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Nama Lengkap:</strong> <span>{{ $person->nama_lengkap }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Nama Panggilan:</strong> <span>{{ $person->nama_panggilan }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Jenis Kelamin:</strong> 
                                <span>{{ $person->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>NIK:</strong> <span>{{ $person->nik }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Alamat Lengkap:</strong> <span>{{ $person->alamat_lengkap }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Foto KTP -->
                    <div class="col-md-6 text-center">
                        <p><strong>Foto KTP:</strong></p>
                        @if($person->foto_ktp)
                            <img src="{{ asset('storage/' . $person->foto_ktp) }}" 
                                 class="img-fluid rounded shadow-sm" 
                                 alt="Foto KTP" 
                                 style="max-width: 150px; height: auto;">
                        @else
                            <p class="text-muted fst-italic">Tidak tersedia</p>
                        @endif
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
