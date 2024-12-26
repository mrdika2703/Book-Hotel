<div class="modal fade" id="editModal{{ $hotel->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $hotel->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('hotel.update', $hotel->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Data Fasilitas</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <!-- Jenis Fasilitas -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_fasilitas_{{ $hotel->id }}"
                                class="form-label fw-bold">Jenis Fasilitas</label>
                            <input type="text" name="nama_fasilitas"
                                id="nama_fasilitas_{{ $hotel->id }}"
                                class="form-control"
                                value="{{ old('nama_fasilitas', $hotel->nama_fasilitas) }}"
                                placeholder="Masukkan Jenis Fasilitas" required>
                        </div>

                    </div>

                    <!-- Deskripsi Fasilitas -->
                    <div class="mb-3">
                        <label for="deskripsi_fasilitas_{{ $hotel->id }}"
                            class="form-label fw-bold">Deskripsi Fasilitas</label>
                        <textarea name="deskripsi_fasilitas" id="deskripsi_fasilitas_{{ $hotel->id }}" class="form-control" rows="3"
                            placeholder="Masukkan Deskripsi Fasilitas" required>{{ old('deskripsi_fasilitas', $hotel->deskripsi_fasilitas) }}</textarea>
                    </div>

                    <!-- Foto Fasilitas 1 -->
                    <div class="mb-3">
                        <label for="foto_fasilitas1_{{ $hotel->id }}"
                            class="form-label fw-bold">Foto Fasilitas 1</label>
                        <input type="file" name="foto_fasilitas1"
                            id="foto_fasilitas1_{{ $hotel->id }}"
                            class="form-control" accept="image/*">
                            @if ($hotel->foto1)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $hotel->foto1) }}" class="img-thumbnail" alt="Foto Fasilitas 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_fasilitas1')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto Fasilitas 2 -->
                    <div class="mb-3">
                        <label for="foto_fasilitas2_{{ $hotel->id }}"
                            class="form-label fw-bold">Foto Fasilitas 2</label>
                        <input type="file" name="foto_fasilitas2"
                            id="foto_fasilitas2_{{ $hotel->id }}"
                            class="form-control" accept="image/*">
                            @if ($hotel->foto2)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $hotel->foto2) }}" class="img-thumbnail" alt="Foto Fasilitas 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_fasilitas2')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto Fasilitas 3 -->
                    <div class="mb-3">
                        <label for="foto_fasilitas3_{{ $hotel->id }}"
                            class="form-label fw-bold">Foto Fasilitas 3</label>
                        <input type="file" name="foto_fasilitas3"
                            id="foto_fasilitas3_{{ $hotel->id }}"
                            class="form-control" accept="image/*">
                            @if ($hotel->foto3)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $hotel->foto3) }}" class="img-thumbnail" alt="Foto Fasilitas 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_fasilitas3')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
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