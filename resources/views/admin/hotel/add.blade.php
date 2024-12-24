<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('hotel.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addModalLabel">
                        <i class="bi bi-person-plus me-2"></i>Tambah Data
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_fasilitas"
                                class="form-label fw-bold">Nama Fasilitas</label>
                            <input type="text" name="nama_fasilitas"
                                id="nama_fasilitas" class="form-control"
                                value="{{ old('nama_fasilitas') }}"
                                placeholder="Masukkan Nama Fasilitas" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_fasilitas"
                            class="form-label fw-bold">Deskripsi Kamar</label>
                        <textarea name="deskripsi_fasilitas" id="deskripsi_fasilitas" class="form-control" rows="3"
                            placeholder="Masukkan alamat lengkap" required>{{ old('deskripsi_fasilitas') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_fasilitas1"
                            class="form-label fw-bold">Foto Fasilitas 1</label>
                        <input type="file" name="foto_fasilitas1"
                            id="foto_fasilitas1" class="form-control"
                            accept="image/*">
                        @error('foto_fasilitas1')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_fasilitas2"
                            class="form-label fw-bold">Foto Fasilitas 2</label>
                        <input type="file" name="foto_fasilitas2"
                            id="foto_fasilitas2" class="form-control"
                            accept="image/*">
                        @error('foto_fasilitas2')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_fasilitas3"
                            class="form-label fw-bold">Foto Fasilitas 3</label>
                        <input type="file" name="foto_fasilitas3"
                            id="foto_fasilitas3" class="form-control"
                            accept="image/*">
                        @error('foto_fasilitas3')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Simpan
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>