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