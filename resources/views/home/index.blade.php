<x-home.layout>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            @if (!empty($fasilitas))
                @forelse ($fasilitas as $hotel)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" 
                    class='@if ($hotel->nama_fasilitas == 'Tempat Santai Pantai') active @endif'
                        aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
                @empty
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                        aria-label="Slide 6"></button>
                @endforelse
            @endif
        </div>
        <div class="carousel-inner">
            @if (!empty($fasilitas))
                @forelse ($fasilitas as $hotel)
                    <div
                        class='carousel-item 
                    @if ($hotel->nama_fasilitas == 'Tempat Santai Pantai') active @endif
                    '>
                        <img src="{{ asset('storage/' . $hotel->foto1) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $hotel->nama_fasilitas }}</h5>
                            <p>{{ $hotel->deskripsi_fasilitas }}</p>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="images/home/TempatSantaiPantai.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tempat Santai Pantai</h5>
                            <p>Nyaman dan saksikan sunrise yang memukau</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/home/KolamRenang2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Kolam Renang</h5>
                            <p>Kolam air tawar yang mewah sampai kedalaman 5 meter</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/home/RestaurantDalamRuang.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Restaurant Indoor</h5>
                            <p>Nyaman dan hangat dengan menu yang menjakan lidahmu</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/home/RestaurantMewah.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Restaurant Outdoor</h5>
                            <p>Berbagai menu istimewa hadir untuk anda</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/home/SarapanGratis.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Sarapan Gratis</h5>
                            <p>Dengan menu yang dibawa oleh chef handal kami</p>
                        </div>
                    </div>
                @endforelse
            @endif

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="object-fit-none">
        <div class="gradienthome"></div>
    </div>



    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="mb-4">Fasilitas Hotel</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Dengan fasilitas premium yang akan memanjakan liburan maupun istirahat anda di hotel kami.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @if (!empty($fasilitas))
                    @forelse ($fasilitas as $hotel)
                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img ratio ratio-21x9">
                                        <img src="{{ asset('storage/' . $hotel->foto1) }}" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail"
                                            style="color: #004e5a">{{ $hotel->nama_fasilitas }}</a>
                                    </h4>
                                    <p>{{ $hotel->deskripsi_fasilitas }}</p>
                                </div>
                            </div>
                        </div>


                    @empty
                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img">
                                        <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan
                                            Gratis</a>
                                    </h4>
                                    <p>Dengan menu yang dibawa oleh chef handal kami</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img">
                                        <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan
                                            Gratis</a>
                                    </h4>
                                    <p>Dengan menu yang dibawa oleh chef handal kami</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img">
                                        <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan
                                            Gratis</a>
                                    </h4>
                                    <p>Dengan menu yang dibawa oleh chef handal kami</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img">
                                        <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan
                                            Gratis</a>
                                    </h4>
                                    <p>Dengan menu yang dibawa oleh chef handal kami</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>

        </div>
    </section>


    <section class="section testimonial visit" style="padding: 15 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="section-title">
                        <h4 style="color: white">Segera Booking</h4>
                        <h2 class="mb-4" style="color: white">Hotel DK</h2>
                        <div class="divider  my-4" style="background: white;"></div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-6">
                    <p style="color: white; text-align: justify;">
                        Selamat datang di Hotel DK, tempat di mana kenyamanan dan layanan berkualitas bertemu. Dengan
                        lokasi strategis, kami menawarkan pengalaman menginap yang tak terlupakan. Nikmati kamar-kamar
                        elegan yang dirancang untuk memenuhi kebutuhan Anda, mulai dari Standard Room yang nyaman hingga
                        Suite Room yang mewah dengan fasilitas premium. Hotel kami juga menyediakan layanan kelas atas,
                        restoran dengan berbagai pilihan menu lezat, serta fasilitas pendukung seperti Wi-Fi cepat,
                        pusat kebugaran, dan ruang pertemuan. Baik untuk perjalanan bisnis, liburan keluarga, atau acara
                        spesial, Hotel DK adalah pilihan sempurna untuk Anda. Pesan sekarang dan rasakan kenyamanan
                        serta layanan terbaik di Hotel DK!
                    </p>
                    <p style="color: white; text-align: justify;">
                        Terletak di jawa timur Indonesia, Hotel Kaya menawarkan alternatif dalam mempelajari
                        tradisi budaya Indonesia dengan cara yang lebih modern, menyenangkan, mudah dan gratis.
                    </p>
                    <div class="row">
                        <a href="/booking" class="col d-flex justify-content-start btnVisit">
                            <h4>Booking Kamar<i class="icofont-simple-right ml-2 "></i></h4>
                        </a>
                        <a href="/about" class="col d-flex justify-content-end btnVisit">
                            <h4>About<i class="icofont-simple-right ml-2 "></i></h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="object-fit-none">
        <div class="gradienthome"></div>
    </div>

    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="mb-4">Tipe Kamar Kami</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Hotel kami memiliki 4 tipe kamar: Standard Room, Deluxe Room, Suite Room, serta Family Room
                            yang luas.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!empty($kamar))
                    @forelse ($kamar as $kamar)
                        <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box my-bg rounded shadow-sm">
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0" style="padding-bottom: 5px">
                                        <a href="#" class="text-decoration-none"
                                            style="color: white">{{ $kamar->jenis_kamar }}</a>
                                    </h4>
                                </div>
                                <div class="doctor-profile">
                                    <div class="doctor-img position-relative ratio ratio-16x9 overflow-hidden rounded">
                                        <img src="{{ asset('storage/' . $kamar->foto1) }}" alt="room-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                        <!-- Overlay -->
                                        <div
                                            class="fasilitas-overlay d-flex flex-column justify-content-center align-items-center text-center">
                                            <h5 class="text-light mb-2">Detail Kamar</h5>
                                            <p class="mb-1 text-light">Tersedia:
                                                <span>{{ $kamar->jumlah_kamar }}</span>
                                            </p>
                                            <p class="mb-1 text-light">Harga: <span>Rp
                                                    {{ number_format($kamar->harga_kamar, 0, ',', '.') }}</span></p>
                                            <p class="mb-1 text-light">Fasilitas: <span>{{ $kamar->fasilitas }}</span>
                                            </p>
                                            <p class="mb-0 text-light"><span>{{ $kamar->deskripsi_kamar }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    @empty
                        <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box my-bg rounded shadow-sm">
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0" style="padding-bottom: 5px">
                                        <a href="#" class="text-decoration-none"
                                            style="color: white">Deluxe</a>
                                    </h4>
                                </div>
                                <div class="doctor-profile">
                                    <div class="doctor-img position-relative ratio ratio-16x9 overflow-hidden rounded">
                                        <img src="{{ asset('images/home/FRoom.jpg') }}" alt="room-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">

                                        <!-- Overlay -->
                                        <div
                                            class="fasilitas-overlay d-flex flex-column justify-content-center align-items-center text-center">
                                            <h5 class="text-light mb-2">Detail Kamar</h5>
                                            <p class="mb-1 text-light">Tersedia : <span>10</span>
                                            </p>
                                            <p class="mb-1 text-light">Harga : <span>Rp 100.000</span></p>
                                            <p class="mb-1 text-light">Fasilitas : <span>Fasilitas</span>
                                            <p class="mb-1 text-light"><span>Deskripsi</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box my-bg rounded shadow-sm">
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0" style="padding-bottom: 5px">
                                        <a href="#" class="text-decoration-none"
                                            style="color: white">Deluxe</a>
                                    </h4>
                                </div>
                                <div class="doctor-profile">
                                    <div class="doctor-img position-relative ratio ratio-16x9 overflow-hidden rounded">
                                        <img src="{{ asset('images/home/FRoom.jpg') }}" alt="room-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">

                                        <!-- Overlay -->
                                        <div
                                            class="fasilitas-overlay d-flex flex-column justify-content-center align-items-center text-center">
                                            <h5 class="text-light mb-2">Detail Kamar</h5>
                                            <p class="mb-1 text-light">Tersedia : <span>10</span>
                                            </p>
                                            <p class="mb-1 text-light">Harga : <span>Rp 100.000</span></p>
                                            <p class="mb-1 text-light">Fasilitas : <span>Fasilitas</span>
                                            <p class="mb-1 text-light"><span>Deskripsi</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                @else
                @endif

            </div>



        </div>
        </div>
    </section>

</x-home.layout>
