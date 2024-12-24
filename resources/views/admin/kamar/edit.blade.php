<div class="modal fade" id="editModal{{ $kamar->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kamar->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('kamar.update', $kamar->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Data Kamar</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <!-- Jenis Kamar -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kamar_{{ $kamar->id }}"
                                class="form-label fw-bold">Jenis Kamar</label>
                            <input type="text" name="jenis_kamar"
                                id="jenis_kamar_{{ $kamar->id }}"
                                class="form-control"
                                value="{{ old('jenis_kamar', $kamar->jenis_kamar) }}"
                                placeholder="Masukkan Jenis Kamar" required>
                        </div>

                        <!-- Jumlah Kamar -->
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kamar_{{ $kamar->id }}"
                                class="form-label fw-bold">Jumlah Kamar</label>
                            <input type="number" name="jumlah_kamar"
                                id="jumlah_kamar_{{ $kamar->id }}"
                                class="form-control"
                                value="{{ old('jumlah_kamar', $kamar->jumlah_kamar) }}"
                                placeholder="Masukkan Jumlah Kamar" required>
                        </div>

                        <!-- Fasilitas Kamar -->
                        <div class="col-md-6 mb-3">
                            <label for="fasilitas_{{ $kamar->id }}"
                                class="form-label fw-bold">Fasilitas
                                Kamar</label>
                            <input type="text" name="fasilitas"
                                id="fasilitas_{{ $kamar->id }}"
                                class="form-control"
                                value="{{ old('fasilitas', $kamar->fasilitas) }}"
                                placeholder="Masukkan Fasilitas Kamar"
                                required>
                        </div>

                        <!-- Harga Kamar -->
                        <div class="col-md-6 mb-3">
                            <label for="harga_kamar_{{ $kamar->id }}"
                                class="form-label fw-bold">Harga Kamar</label>
                            <input type="number" name="harga_kamar"
                                id="harga_kamar_{{ $kamar->id }}"
                                class="form-control"
                                value="{{ old('harga_kamar', $kamar->harga_kamar) }}"
                                placeholder="Masukkan Harga Kamar" required>
                        </div>
                    </div>

                    <!-- Deskripsi Kamar -->
                    <div class="mb-3">
                        <label for="deskripsi_kamar_{{ $kamar->id }}"
                            class="form-label fw-bold">Deskripsi Kamar</label>
                        <textarea name="deskripsi_kamar" id="deskripsi_kamar_{{ $kamar->id }}" class="form-control" rows="3"
                            placeholder="Masukkan Deskripsi Kamar" required>{{ old('deskripsi_kamar', $kamar->deskripsi_kamar) }}</textarea>
                    </div>

                    <!-- Foto Kamar 1 -->
                    <div class="mb-3">
                        <label for="foto_kamar1_{{ $kamar->id }}"
                            class="form-label fw-bold">Foto Kamar 1</label>
                        <input type="file" name="foto_kamar1"
                            id="foto_kamar1_{{ $kamar->id }}"
                            class="form-control" accept="image/*">
                            @if ($kamar->foto1)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $kamar->foto1) }}" class="img-thumbnail" alt="Foto Kamar 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_kamar1')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto Kamar 2 -->
                    <div class="mb-3">
                        <label for="foto_kamar2_{{ $kamar->id }}"
                            class="form-label fw-bold">Foto Kamar 2</label>
                        <input type="file" name="foto_kamar2"
                            id="foto_kamar2_{{ $kamar->id }}"
                            class="form-control" accept="image/*">
                            @if ($kamar->foto2)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $kamar->foto2) }}" class="img-thumbnail" alt="Foto Kamar 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_kamar2')
                            <span
                                class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto Kamar 3 -->
                    <div class="mb-3">
                        <label for="foto_kamar3_{{ $kamar->id }}"
                            class="form-label fw-bold">Foto Kamar 3</label>
                        <input type="file" name="foto_kamar3"
                            id="foto_kamar3_{{ $kamar->id }}"
                            class="form-control" value="{{$kamar->foto_kamar3}}" accept="image/*">
                            @if ($kamar->foto3)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $kamar->foto3) }}" class="img-thumbnail" alt="Foto Kamar 1" style="max-width: 200px;">
                            </div>
                        @endif
                        @error('foto_kamar3')
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