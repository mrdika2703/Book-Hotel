<div class="modal fade" id="editModal{{ $users->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $users->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg">
            <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Username -->
                        <div class="col-md-6 mb-3">
                            <label for="username_{{ $users->id }}" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username_{{ $users->id }}" class="form-control"
                                value="{{ old('username', $users->username) }}" placeholder="Masukkan Username"
                                required>
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password_{{ $users->id }}" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password_{{ $users->id }}"
                                class="form-control" value="{{ old('password') }}" placeholder="Masukkan Password"
                                autocomplete="current-password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label for="role_{{ $users->id }}" class="form-label fw-bold">Role</label>
                            <select name="role" id="role_{{ $users->id }}" class="form-control" required>
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="tamu" {{ old('role', $users->role) == 'tamu' ? 'selected' : '' }}>Tamu
                                </option>
                                <option value="resepsionis"
                                    {{ old('role', $users->role) == 'resepsionis' ? 'selected' : '' }}>Resepsionis
                                </option>
                                <option value="admin" {{ old('role', $users->role) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap_{{ $users->id }}" class="form-label fw-bold">Nama
                                Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap_{{ $users->id }}"
                                class="form-control" value="{{ old('nama_lengkap', $users->nama_lengkap) }}"
                                placeholder="Masukkan Nama Lengkap" required>
                            @error('nama_lengkap')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Nama Panggilan -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_panggilan_{{ $users->id }}" class="form-label fw-bold">Nama
                                Panggilan</label>
                            <input type="text" name="nama_panggilan" id="nama_panggilan_{{ $users->id }}"
                                class="form-control" value="{{ old('nama_panggilan', $users->nama_panggilan) }}"
                                placeholder="Masukkan Nama Panggilan" required>
                            @error('nama_panggilan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin_{{ $users->id }}" class="form-label fw-bold">Jenis
                                Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_{{ $users->id }}" class="form-control"
                                required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L"
                                    {{ old('jenis_kelamin', $users->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $users->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email_{{ $users->id }}" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email_{{ $users->id }}" class="form-control"
                                value="{{ old('email', $users->email) }}" placeholder="Masukkan Email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- No Telepon -->
                        <div class="col-md-6 mb-3">
                            <label for="no_telepon_{{ $users->id }}" class="form-label fw-bold">No Telepon</label>
                            <input type="tel" name="no_telepon" id="no_telepon_{{ $users->id }}"
                                class="form-control" value="{{ old('no_telepon', $users->no_telepon) }}"
                                placeholder="Masukkan No Telepon" required>
                            @error('no_telepon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
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
