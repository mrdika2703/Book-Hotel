    <!-- REQUIRED SCRIPTS -->

    {{-- <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script> --}}

    <!-- Main jQuery -->
    {{-- <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.easing.js') }}"></script> --}}
    {{-- <script>
        // Tambah
        $('#addModal form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const formData = new FormData(this);
    
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        }).then(() => {
                            location.reload(); // Reload halaman
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menambah data.',
                    });
                }
            });
        });
    
        // Edit
        $('.editModal form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const formData = new FormData(this);
    
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        }).then(() => {
                            location.reload(); // Reload halaman
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat mengedit data.',
                    });
                }
            });
        });
    
        // Hapus
        $('.delete-button').on('click', function(e) {
            e.preventDefault();
            const url = $(this).data('url');
    
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                }).then(() => {
                                    location.reload(); // Reload halaman
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data.',
                            });
                        }
                    });
                }
            });
        });
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    
    <!-- Slick Slider -->
    {{-- <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script> --}}
    <!-- Counterup -->
    {{-- <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
    
    <script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script> --}}
    <!-- Google Map -->
    {{-- <script src="{{ asset('plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>     --}}

    {{-- <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script> --}}

</body>

</html>
