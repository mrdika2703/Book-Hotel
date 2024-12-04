<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/admin"><b>Admin</b> Book Hotel</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                {{-- <h4 class="text-center mb-4">Login</h4> --}}
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('loginadm') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="input-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="input-group-text" id="username" name="username"
                            value="{{ old('username') }}" required>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text" style="cursor: pointer;" onclick="togglePassword('password', this)">
                                <span class="fas fas fa-lock"></span> <!-- Ikon Mata Awal -->
                            </div>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    {{-- <div class="input-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="input-group-text" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="togglePassword('password')">
                                Show
                            </button>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="text-center mb-3">
                        <!-- /.col -->
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="text-center mt-3">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script>
        function togglePassword(fieldId, iconContainer) {
            const passwordField = document.getElementById(fieldId);
            const icon = iconContainer.querySelector('span'); // Ambil elemen ikon di dalam kontainer
    
            if (passwordField.type === "password") {
                // Jika password disembunyikan, ubah ke teks dan tampilkan ikon mata
                passwordField.type = "text";
                icon.className = "fas fa-eye"; // Ubah ikon ke kunci
            } else {
                // Jika password terlihat, sembunyikan dan ubah ke ikon kunci
                passwordField.type = "password";
                icon.className = "fas fa-lock"; // Ubah ikon ke mata
            }
        }
    </script>
    
</body>

</html>
