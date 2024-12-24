<!-- Modal View -->
<div class="modal fade" id="viewModal{{ $kamar->id }}" tabindex="-1"
    aria-labelledby="viewModalLabel{{ $kamar->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel{{ $kamar->id }}">
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
                                <span>{{ $kamar->jenis_kamar }}</span>
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