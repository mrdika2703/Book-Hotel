<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header my-bg text-white">
                    <h5 class="modal-title" id="addModalLabel">
                        <i class="bi bi-person-plus me-2"></i>Tambah Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" 
                                   class="form-control" 
                                   value="{{ old('nama_lengkap') }}" 
                                   placeholder="Masukkan nama lengkap" 
                                   required>
                        </div>

                        <!-- Nama Panggilan -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_panggilan" class="form-label fw-bold">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" id="nama_panggilan" 
                                   class="form-control" 
                                   value="{{ old('nama_panggilan') }}" 
                                   placeholder="Masukkan nama panggilan" 
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="" disabled selected>Pilih jenis kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label fw-bold">NIK</label>
                            <input type="number" name="nik" id="nik" 
                                   class="form-control" 
                                   value="{{ old('nik') }}" 
                                   placeholder="Masukkan NIK" 
                                   required>
                            @error('nik')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label fw-bold">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" id="alamat_lengkap" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lengkap"
                                  required>{{ old('alamat_lengkap') }}</textarea>
                    </div>

                    <!-- Foto KTP -->
                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label fw-bold">Foto KTP</label>
                        <input type="file" name="foto_ktp" id="foto_ktp" 
                               class="form-control" 
                               accept="image/*">
                        @error('foto_ktp')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
