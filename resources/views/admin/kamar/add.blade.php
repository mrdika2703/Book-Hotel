<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('kamar.store') }}" method="POST"
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
                            <label for="jenis_kamar"
                                class="form-label fw-bold">Jenis Kamar</label>
                            <input type="text" name="jenis_kamar"
                                id="jenis_kamar" class="form-control"
                                value="{{ old('jenis_kamar') }}"
                                placeholder="Masukkan Jenis Kamar" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kamar"
                                class="form-label fw-bold">Jumlah Kamar</label>
                            <input type="number" name="jumlah_kamar"
                                id="jumlah_kamar" class="form-control"
                                value="{{ old('jumlah_kamar') }}"
                                placeholder="Masukkan Jumlah Kamar" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="fasilitas"
                                class="form-label fw-bold">Fasilitas
                                Kamar</label>
                            <input type="text" name="fasilitas"
                                id="fasilitas" class="form-control"
                                value="{{ old('fasilitas') }}"
                                placeholder="Masukkan Fasilitas Kamar"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga_kamar"
                                class="form-label fw-bold">Harga Kamar</label>
                            <input type="number" name="harga_kamar"
                                id="harga_kamar" class="form-control"
                                value="{{ old('harga_kamar') }}"
                                placeholder="Masukkan Harga Kamar" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_kamar"
                            class="form-label fw-bold">Deskripsi Kamar</label>
                        <textarea name="deskripsi_kamar" id="deskripsi_kamar" class="form-control" rows="3"
                            placeholder="Masukkan alamat lengkap" required>{{ old('deskripsi_kamar') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_kamar1"
                            class="form-label fw-bold">Foto Kamar 1</label>
                        <input type="file" name="foto_kamar1"
                            id="foto_kamar1" class="form-control"
                            accept="image/*">
                        @error('foto_kamar1')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_kamar2"
                            class="form-label fw-bold">Foto Kamar 2</label>
                        <input type="file" name="foto_kamar2"
                            id="foto_kamar2" class="form-control"
                            accept="image/*">
                        @error('foto_kamar2')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto_kamar3"
                            class="form-label fw-bold">Foto Kamar 3</label>
                        <input type="file" name="foto_kamar3"
                            id="foto_kamar3" class="form-control"
                            accept="image/*">
                        @error('foto_kamar3')
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