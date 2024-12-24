<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('users.store') }}" method="POST"
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
                            <label for="username"
                                class="form-label fw-bold">Username</label>
                            <input type="text" name="username"
                                id="username" class="form-control"
                                value="{{ old('username') }}"
                                placeholder="Masukkan Username" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password"
                                class="form-label fw-bold">Password</label>
                            <input type="password" name="password"
                                id="password" class="form-control"
                                value="{{ old('password') }}"
                                placeholder="Masukkan Password" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label fw-bold">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="tamu" {{ old('role') == 'tamu' ? 'selected' : '' }}>Tamu</option>
                                <option value="resepsionis" {{ old('role') == 'resepsionis' ? 'selected' : '' }}>Resepsionis</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap"
                                class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                id="nama_lengkap" class="form-control"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nama_panggilan"
                                class="form-label fw-bold">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan"
                                id="nama_panggilan" class="form-control"
                                value="{{ old('nama_panggilan') }}"
                                placeholder="Masukkan Nama Panggilan" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email"
                                class="form-label fw-bold">Email</label>
                            <input type="email" name="email"
                                id="email" class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan Email" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_telepon"
                                class="form-label fw-bold">No Telepon</label>
                            <input type="number" name="no_telepon"
                                id="no_telepon" class="form-control"
                                value="{{ old('no_telepon') }}"
                                placeholder="Masukkan No Telepon" required>
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