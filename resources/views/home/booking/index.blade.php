<x-home.layout>

    <div class="breaknav"></div>

    <section class="page-title bg-1 position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.5; background: #004e5a;"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center position-relative" style="z-index: 2;">
                        <span class="text-white d-block"></span>
                        <h1 class="text-capitalize mb-5 text-lg text-white">Booking</h1>

                        <!-- Breadcrumb -->
                        <!-- Uncomment jika diperlukan -->
                        <!--
                        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="section">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-4">Booking Room</h2>
                <div class="divider mx-auto my-4"></div>
            </div>
            <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row py-4 px-2">
                            <div class="col-md">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label for="tanggal_checkin" class="input-group-text my-bg border-0"> Check
                                            In</label>
                                    </div>
                                    <input type="date" id="tanggal_checkin" name="tanggal_checkin"
                                        class="form-control rounded" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label for="tanggal_checkout" class="input-group-text my-bg border-0"> Check
                                            Out</label>
                                    </div>
                                    <input type="date" id="tanggal_checkout" name="tanggal_checkout"
                                        class="form-control rounded" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="input-group mb-2">
                                {{-- <span class="input-group-text my-bg" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Username"
                                    aria-describedby="basic-addon1"> --}}

                                {{-- <label for="id_people" class="form-label">Pilih People</label> --}}
                                <span class="input-group-text my-bg"><i class="fa-solid fa-user"></i></span>
                                <select id="id_people" name="id_people" class="form-select"
                                    aria-describedby="basic-addon1" required>
                                    <option value="">-- Pilih Orang --</option>
                                    @foreach ($people as $person)
                                        <option value="{{ $person->id }}">{{ $person->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                <a href="home/add">
                                    <span class="input-group-text my-bg"><i class="fa-solid fa-user-plus"></i>`</span>
                                </a>
                            </div>

                            <div class="input-group mb-4">
                                {{-- <label for="id_kamar" class="form-label">Pilih Kamar</label> --}}
                                <span class="input-group-text my-bg"><i class="fa-solid fa-bed"></i></span>
                                <select id="id_kamar" name="id_kamar" class="form-select"
                                    aria-describedby="basic-addon1" required>
                                    <option value="">-- Pilih Kamar --</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}" data-price="{{ $room->harga_kamar }}"
                                            data-available="{{ $room->jumlah_kamar }}">
                                            {{ $room->jenis_kamar }} -
                                            Rp{{ number_format($room->harga_kamar, 0, ',', '.') }} (Tersedia:
                                            {{ $room->jumlah_kamar }})
                                        </option>
                                    @endforeach
                                </select>
                                {{-- <span class="input-group-text my-bg" >@</span>
                                <input type="text" class="form-control" placeholder="NIK" aria-label="Username"
                                    aria-describedby="basic-addon1"> --}}
                            </div>

                            <div class="input-group mb-2">
                                {{-- <label for="pembayaran" class="form-label">Metode Pembayaran</label> --}}
                                <span class="input-group-text my-bg"><i class="fa-solid fa-money-check"></i></span>
                                <select id="pembayaran" name="pembayaran" class="form-select"
                                    aria-describedby="basic-addon1" required>
                                    <option value="">-- Metode Pembayaran --</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                {{-- <span class="input-group-text my-bg" >@</span>
                                <input type="text" class="form-control" placeholder="Email" aria-label="Username"
                                    aria-describedby="basic-addon1"> --}}
                            </div>

                            <div class="input-group mb-2">
                                {{-- <label for="total_harga" class="form-label">Total Harga</label> --}}
                                <span class="input-group-text my-bg"><i class="fa-solid fa-dollar-sign"></i></span>
                                <input type="text" id="total_harga" class="form-control"
                                    aria-describedby="basic-addon1" readonly>
                                <span class="input-group-text my-bg">@</span>
                                {{-- <input type="text" class="form-control" placeholder="Nomer Telepon"
                                    aria-label="Username" aria-describedby="basic-addon1"> --}}
                            </div>
                            <br><br>
                            <button id="submitButton" type="submit" class="btn btn-primary my-bg w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Seleksi form dan tombol submit
        const form = document.querySelector('#bookingForm');
        const submitButton = document.querySelector('#submitButton');

        // Event listener untuk tombol submit
        submitButton.addEventListener('click', (event) => {
            event.preventDefault(); // Cegah pengiriman form langsung

            // SweetAlert konfirmasi
            Swal.fire({
                title: 'Konfirmasi Pemesanan',
                text: 'Anda yakin semua data sudah benar?, tindakan ini tidak dapat diulangi.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika dikonfirmasi
                    form.submit();
                }
            });
        });

            // Periksa jika ada error validation dan tampilkan dengan SweetAlert
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `<ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>`,
                });
            @endif

            // Periksa jika ada session success
            @if (session('success') && session('booking_id'))
                Swal.fire({
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Oke',
                    cancelButtonText: 'Lihat PDF',
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        const pdfUrl = "{{ route('booking.pdf', ':id') }}".replace(':id',
                            "{{ session('booking_id') }}");
                        window.open(pdfUrl, '_blank');
                    }
                });
            @endif

            // Kalkulasi total harga
            const checkin = document.getElementById('tanggal_checkin');
            const checkout = document.getElementById('tanggal_checkout');
            const roomSelect = document.getElementById('id_kamar');
            const totalPriceInput = document.getElementById('total_harga');

            const calculatePrice = () => {
                const checkinDate = new Date(checkin.value);
                const checkoutDate = new Date(checkout.value);

                if (roomSelect.options[roomSelect.selectedIndex]) {
                    const selectedRoom = roomSelect.options[roomSelect.selectedIndex];
                    const pricePerNight = parseFloat(selectedRoom.getAttribute('data-price')) || 0;

                    if (checkinDate && checkoutDate && pricePerNight) {
                        const days = (checkoutDate - checkinDate) / (1000 * 60 * 60 * 24);
                        if (days > 0) {
                            totalPriceInput.value = 'Rp ' + (days * pricePerNight).toLocaleString();
                        } else {
                            totalPriceInput.value = 'Tanggal check-out harus lebih dari check-in.';
                        }
                    }
                }
            };

            // Event listener untuk kalkulasi otomatis
            checkin.addEventListener('change', calculatePrice);
            checkout.addEventListener('change', calculatePrice);
            roomSelect.addEventListener('change', calculatePrice);
        });
    </script>




    {{-- <div class="section" style="">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-4">Booking Room</h2>
                <div class="divider mx-auto my-4"></div>
            </div>
            <form class="row bg-white py-4 px-2 form-pesan border shadow">
                <div class="col-md">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label for="masuk" class="input-group-text bg-white border-0"> Check In</label>
                        </div>
                        <input type="date" id="masuk" name="masuk" class="form-control rounded"
                            placeholder="Check In">
                    </div>
                </div>
                <div class="col-md">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label for="keluar" class="input-group-text bg-white border-0"> Check Out</label>
                        </div>
                        <input type="date" id="keluar" name="keluar" class="form-control rounded"
                            placeholder="Check Out">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <form action="">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
        </form>
    </div> --}}



</x-home.layout>
