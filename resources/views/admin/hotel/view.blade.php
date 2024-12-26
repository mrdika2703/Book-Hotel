<!-- Modal View -->
<div class="modal fade" id="viewModal{{ $hotel->id }}" tabindex="-1"
    aria-labelledby="viewModalLabel{{ $hotel->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel{{ $hotel->id }}">
                    <i class="bi bi-person-lines-fill me-2"></i>Detail Data Fasilitas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <!-- Data Pribadi -->
                    <div class="row mb-3">
                        <div class="col">
                            <strong>ID :</strong>
                        </div>
                        <div class="col">
                            <span>#{{ $hotel->id }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Nama Fasilitas :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $hotel->nama_fasilitas }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Deskripsi :</strong>
                        </div>
                        <div class="col">
                            <span>{{ $hotel->deskripsi_fasilitas }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Foto 1 :</strong>
                        </div>
                        <div class="col">
                            <span>
                                @if ($hotel->foto2)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $hotel->foto1) }}" class="img-thumbnail"
                                            alt="Foto Kamar 1" style="max-width: 200px;">
                                    </div>
                                @else
                                Foto tidak ada
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Foto 2 :</strong>
                        </div>
                        <div class="col">
                            <span>
                                @if ($hotel->foto2)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $hotel->foto2) }}" class="img-thumbnail"
                                            alt="Foto Kamar 1" style="max-width: 200px;">
                                    </div>
                                @else
                                Foto tidak ada
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <strong>Foto 3 :</strong>
                        </div>
                        <div class="col">
                            <span>
                                @if ($hotel->foto2)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $hotel->foto3) }}" class="img-thumbnail"
                                            alt="Foto Kamar 1" style="max-width: 200px;">
                                    </div>
                                @else
                                Foto tidak ada
                                @endif
                            </span>
                        </div>
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