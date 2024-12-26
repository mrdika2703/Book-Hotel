<div class="modal fade" id="viewModal{{ $person->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $person->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header my-bg text-white">
                <h5 class="modal-title" id="viewModalLabel{{ $person->id }}">
                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>{{ $person->nik }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>{{ $person->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Panggilan</th>
                                    <td>{{ $person->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>
                                        @if ($person->jenis_kelamin == 'L')
                                            Laki-Laki
                                        @elseif ($person->jenis_kelamin == 'P')
                                            Perempuan
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Panggilan</th>
                                    <td>{{ $person->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat Lengkap</th>
                                    <td>{{ $person->alamat_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Foto KTP</th>
                                    <td> <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ktpModal{{ $person->id }}">Lihat KTP</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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


<!-- Modal -->
<div class="modal fade" id="ktpModal{{ $person->id }}" tabindex="-1"
    aria-labelledby="ktpModalLabel{{ $person->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header my-bg">
                <h1 class="modal-title fs-5">Foto KTP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    @if ($person->foto_ktp)
                        <img src="{{ asset('storage/' . $person->foto_ktp) }}" class="img-fluid rounded shadow-sm"
                            alt="Foto KTP" style="max-width: 150px; height: auto;">
                    @else
                        <p class="text-muted fst-italic">Tidak tersedia</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
