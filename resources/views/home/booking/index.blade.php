<x-home.layout>

    <x-home.banner></x-home.banner>

    <div class="section">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-4">Booking Room</h2>
                <div class="divider mx-auto my-4"></div>
            </div>
            <form action="{{ route('booking.store') }}" method="POST">
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
                                <span class="input-group-text my-bg" ><i class="fa-solid fa-user"></i></span>
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
                                <span class="input-group-text my-bg" ><i class="fa-solid fa-money-check"></i></span>
                                <select id="pembayaran" name="pembayaran" class="form-select" aria-describedby="basic-addon1" required>
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
                                <span class="input-group-text my-bg" ><i class="fa-solid fa-dollar-sign"></i></span>
                                <input type="text" id="total_harga" class="form-control" aria-describedby="basic-addon1" readonly>
                                <span class="input-group-text my-bg" >@</span>
                                {{-- <input type="text" class="form-control" placeholder="Nomer Telepon"
                                    aria-label="Username" aria-describedby="basic-addon1"> --}}
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary my-bg w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Periksa jika ada session success dan booking_id
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

            // Fungsi kalkulasi harga total
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

            // Event listeners untuk kalkulasi otomatis
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
