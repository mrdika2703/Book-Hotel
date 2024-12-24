<x-home.layout>

    <!-- Section Title -->
    <section class="page-title bg-1 position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.5; background: #004e5a;"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center position-relative" style="z-index: 2;">
                        <h1 class="text-capitalize mb-5 text-lg text-white">Profil</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <div class="container my-5 main-content content-wrapper">
        <!-- Judul Halaman -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-cyan"><i class="fa-solid fa-user"></i> Profil Pengguna</h3>
        </div>

        <!-- Profil Card -->
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Profil -->
                    <div class="col-md-4 text-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9SPHGbT7zpUnQWxX6G23hhBVjxxAioJDoSNePax1i6FPVuO1bD2NweVg44RenkPB3vTI&usqp=CAU"
                            alt="Foto Profil" class="img-fluid rounded-circle mb-3">
                        <h5 class="fw-bold mt-2 text-cyan">{{ $user->nama_panggilan }}</h5>
                        <p class="text-muted">{{ $user->role }}</p>
                    </div>

                    <!-- Informasi Profil -->
                    <div class="col-md-8">
                        <div class="row mb-4">

                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">Nama Lengkap :</h6>
                                <p class="text-dark mb-0">{{ $user->nama_lengkap }} ({{ $user->nama_panggilan }})</p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">Username :</h6>
                                <p class="text-dark mb-0">{{ $user->username }}</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">Role :</h6>
                                <p class="text-dark mb-0">{{ $user->role }}</p>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">Jenis Kelamin :</h6>
                                <p class="text-dark mb-0">
                                    @if ($user->jenis_kelamin == 'L')
                                        Laki-Laki
                                    @elseif ($user->jenis_kelamin == 'P')
                                        Perempuan
                                    @else
                                        Unknown
                                    @endif
                                </p>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">Email :</h6>
                                <p class="text-dark mb-0">{{ $user->email }}</p>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="fw-bold text-cyan">No. Telepon :</h6>
                                <p class="text-dark mb-0">{{ $user->no_telepon }}</p>
                            </div>
                        </div>

                        <div class="row mb-5">

                        </div>

                        <div class="text-end mt-4">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProfilModal{{ $user->id }}">Edit Profil</button>
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#changePasswordModal{{ $user->id }}">Ganti Password</button>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteAccountModal{{ $user->id }}">Hapus Akun</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProfilModal{{ $user->id }}" tabindex="-1"
        aria-labelledby="editProfilModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header my-bg">
                    <h5 class="modal-title" id="editProfilModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profil.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="{{ $user->nama_lengkap }}">
                            @error('nama_lengkap')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan"
                                value="{{ $user->nama_panggilan }}">
                            @error('nama_panggilan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin_{{ $user->id }}" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_{{ $user->id }}" class="form-control">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L"
                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No Telepon</label>
                            <input type="number" class="form-control" id="email" name="no_telepon"
                                value="{{ $user->no_telepon }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="passwordConfirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="passwordConfirmation"
                                    name="password_confirmation" required placeholder="Masukkan password Anda">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('passwordConfirmation')">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>

                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Password -->
    <div class="modal fade" id="changePasswordModal{{ $user->id }}" tabindex="-1"
        aria-labelledby="changePasswordModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header my-bg">
                    <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profil.change_password', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Password Saat Ini</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="currentPassword"
                                    name="current_password" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('currentPassword')">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" name="new_password"
                                    required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('newPassword')">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="confirmNewPassword" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmNewPassword"
                                    name="new_password_confirmation" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('confirmNewPassword')">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Hapus Akun -->
    <div class="modal fade" id="deleteAccountModal{{ $user->id }}" tabindex="-1"
        aria-labelledby="deleteAccountModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header my-bg">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profil.delete_account', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.</p>
                        <div class="mb-3">
                            <label for="deletePasswordConfirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="deletePasswordConfirmation"
                                    name="password_confirmation" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('deletePasswordConfirmation')">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif
        });

        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const button = passwordField.nextElementSibling; // Tombol toggle
            const icon = button.querySelector("i"); // Ikon di dalam tombol

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>

</x-home.layout>
