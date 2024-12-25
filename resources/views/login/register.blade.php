<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c1da8a416.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>

<body class="">
    <br><br><br><br>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2"
            style="background-image: url('{{ asset('images/home/TempatSantaiPantai.jpg') }}');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <h3>Register to <strong class="text-cyan">Booking<i>Hotel</i></strong></h3>
                        <p class="mb-4">Buat akun untuk memesan kamar hotel dengan mudah.</p>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group first mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Masukkan username anda" id="username" value="{{ old('username') }}" required>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan password anda" id="password" required>
                                    <button class="btn btn-light" type="button" onclick="togglePassword('password')">
                                        <i style="color: #616161" class="fa-solid fa-eye-slash"></i>
                                    </button>
                                </div>
                                <small class="form-text">Minimal 8 karakter.</small>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Konfirmasi password anda" id="password_confirmation" required>
                                    <button class="btn btn-light" type="button"
                                        onclick="togglePassword('password_confirmation')">
                                        <i style="color: #616161" class="fa-solid fa-eye-slash"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan nama lengkap anda" value="{{ old('nama_lengkap') }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_panggilan">Nama Panggilan</label>
                                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan"
                                    placeholder="Masukkan nama panggilan anda" value="{{ old('nama_panggilan') }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email anda" value="{{ old('email') }}" required>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_telepon">No Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Masukkan no telepon anda" value="{{ old('no_telepon') }}" required>
                                    @error('no_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input type="submit" value="Register" class="btn mybutton w-100">
                        </form>
                        <p class="text-center mt-3 fw-bold">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script>
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
</body>

</html>
