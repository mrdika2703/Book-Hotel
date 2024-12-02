<div class="modal fade" id="editModal{{ $person->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $person->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('people.update', $person->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editModalLabel{{ $person->id }}">
                        <i class="bi bi-pencil-square me-2"></i>Edit Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap_{{ $person->id }}" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap_{{ $person->id }}" 
                                   class="form-control" 
                                   value="{{ old('nama_lengkap', $person->nama_lengkap) }}" 
                                   placeholder="Masukkan nama lengkap" 
                                   required>
                        </div>

                        <!-- Nama Panggilan -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_panggilan_{{ $person->id }}" class="form-label fw-bold">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" id="nama_panggilan_{{ $person->id }}" 
                                   class="form-control" 
                                   value="{{ old('nama_panggilan', $person->nama_panggilan) }}" 
                                   placeholder="Masukkan nama panggilan" 
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin_{{ $person->id }}" class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_{{ $person->id }}" 
                                    class="form-select" required>
                                <option value="L" {{ old('jenis_kelamin', $person->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $person->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6 mb-3">
                            <label for="nik_{{ $person->id }}" class="form-label fw-bold">NIK</label>
                            <input type="number" name="nik" id="nik_{{ $person->id }}" 
                                   class="form-control" 
                                   value="{{ old('nik', $person->nik) }}" 
                                   placeholder="Masukkan NIK" 
                                   required>
                            @error('nik')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="mb-3">
                        <label for="alamat_lengkap_{{ $person->id }}" class="form-label fw-bold">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" id="alamat_lengkap_{{ $person->id }}" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lengkap"
                                  required>{{ old('alamat_lengkap', $person->alamat_lengkap) }}</textarea>
                    </div>

                    <!-- Foto KTP -->
                    <div class="mb-3">
                        <label for="foto_ktp_{{ $person->id }}" class="form-label fw-bold">Foto KTP</label>
                        <input type="file" name="foto_ktp" id="foto_ktp_{{ $person->id }}" 
                               class="form-control" 
                               accept="image/*">
                        @if($person->foto_ktp)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $person->foto_ktp) }}" 
                                     class="img-thumbnail" 
                                     alt="Foto KTP" 
                                     style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_ktp')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
