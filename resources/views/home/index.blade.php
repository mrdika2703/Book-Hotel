<x-home.layout>

    {{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active ratio ratio-21x9">
                <img src="images/slideshow/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item ratio ratio-21x9">
                <img src="images/slideshow/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item ratio ratio-21x9">
                <img src="images/slideshow/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
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
    </div> --}}

    <x-home.banner></x-home.banner>


    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="mb-4">Fasilitas Hotel</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Hari hari budaya yang harus diikuti oleh masyarakat indonesai untuk melestarikan budaya
                            indonesia supaya tidak berhenti di kita</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!empty($jadwals))
                    @forelse ($jadwals as $jadwals)
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <div class=" ratio ratio-4x3">
                                    <img src="{{ asset($jadwals->gambar_jadwal) }}" alt="image"
                                        class="img-fluid w-100">
                                </div>

                                <h4 class="mt-3">{{ $jadwals->nama_jadwal }}</h4>
                                <p>{{ \Carbon\Carbon::parse($jadwals->tanggal_jadwal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                    @endforelse
                @else
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                        <div class="position-relative doctor-inner-box">
                            <div class="doctor-profile">
                                <div class="doctor-img">
                                    <img src="images/home/SarapanGratis.jpg" alt="doctor-image"
                                        class="img-fluid w-100 border border-info border-4 rounded"
                                        style="border-color: #17a2b8 !important">
                                </div>
                            </div>
                            <div class="content mt-3 text-center">
                                <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
                                </h4>
                                <p>Dengan menu yang dibawa oleh chef handal kami</p>
                            </div>
                        </div>

                    </div>

                </div>



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
                        Selamat datang di Hotel DK, tempat di mana kenyamanan dan layanan berkualitas bertemu. Dengan lokasi strategis, kami menawarkan pengalaman menginap yang tak terlupakan. Nikmati kamar-kamar elegan yang dirancang untuk memenuhi kebutuhan Anda, mulai dari Standard Room yang nyaman hingga Suite Room yang mewah dengan fasilitas premium. Hotel kami juga menyediakan layanan kelas atas, restoran dengan berbagai pilihan menu lezat, serta fasilitas pendukung seperti Wi-Fi cepat, pusat kebugaran, dan ruang pertemuan. Baik untuk perjalanan bisnis, liburan keluarga, atau acara spesial, Hotel DK adalah pilihan sempurna untuk Anda. Pesan sekarang dan rasakan kenyamanan serta layanan terbaik di Hotel DK!
                    </p>
                    <p style="color: white; text-align: justify;">
                        Terletak di jawa timur Indonesia, Hotel Kaya menawarkan alternatif dalam mempelajari
                        tradisi budaya Indonesia dengan cara yang lebih modern, menyenangkan, mudah dan gratis.
                    </p>
                    <div class="row">
                        <a href="https://maps.app.goo.gl/xrYr7DR1v5e2VUL58"
                            class="col d-flex justify-content-start btnVisit">
                            <h4>Booking Kamar<i class="icofont-simple-right ml-2 "></i></h4>
                        </a>
                        <a href="https://maps.app.goo.gl/xrYr7DR1v5e2VUL58"
                            class="col d-flex justify-content-end btnVisit">
                            <h4>Cek Lokasi<i class="icofont-simple-right ml-2 "></i></h4>
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
                        <p>Hotel kami memiliki 4 tipe kamar: Standard Room, Deluxe Room, Suite Room, serta Family Room yang luas.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!empty($jadwals))
                    @forelse ($jadwals as $jadwals)
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <div class=" ratio ratio-4x3">
                                    <img src="{{ asset($jadwals->gambar_jadwal) }}" alt="image"
                                        class="img-fluid w-100">
                                </div>

                                <h4 class="mt-3">{{ $jadwals->nama_jadwal }}</h4>
                                <p>{{ \Carbon\Carbon::parse($jadwals->tanggal_jadwal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="about-block-item mb-5 mb-lg-0">
                                <img src="images/slideshow/ex.png" alt="" class="img-fluid w-100">
                                <h4 class="mt-3">Hari Batik</h4>
                                <p>22 Desember 2024</p>
                            </div>
                        </div>
                    @endforelse
                @else
                @endif

                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                    <div class="position-relative doctor-inner-box border border-info border-2 rounded" style="border-color: #17a2b8 !important">
                        <div class="content mt-3 text-center">
                            <h4 class="mb-0" style="padding-bottom: 5px"><a href="/tokoh/detail" style="color: #004e5a">Regular Room</a></h4>
                        </div>
                        <div class="doctor-profile">
                            <div class="doctor-img position-relative">
                                <img src="images/home/DRoom.jpg" alt="doctor-image"
                                    class="img-fluid w-100 border border-info border-4 rounded"
                                    style="border-color: #17a2b8 !important">

                                <!-- Overlay div -->
                                <div class="fasilitas-overlay">
                                    <p class="fasilitas-text">Fasilitas :</p>
                                    <ul class="fasilitas-text" data-bs-theme="">
                                        <li class="">An item</li>
                                        <li class="">A second item</li>
                                        <li class="">A third item</li>
                                        <li class="">A fourth item</li>
                                        <li class="">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- TIPE KAMAR -->
                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                    <div class="position-relative doctor-inner-box border border-info border-2 rounded" style="border-color: #17a2b8 !important">
                        <div class="content mt-3 text-center">
                            <h4 class="mb-0" style="padding-bottom: 5px"><a href="/tokoh/detail" style="color: #004e5a">Deluxe Room</a></h4>
                        </div>
                        <div class="doctor-profile">
                            <div class="doctor-img position-relative">
                                <img src="images/home/DRoom.jpg" alt="doctor-image"
                                    class="img-fluid w-100 border border-info border-4 rounded"
                                    style="border-color: #17a2b8 !important">

                                <!-- Overlay div -->
                                <div class="fasilitas-overlay">
                                    <p class="fasilitas-text">Fasilitas :</p>
                                    <ul class="fasilitas-text" data-bs-theme="">
                                        <li class="">An item</li>
                                        <li class="">A second item</li>
                                        <li class="">A third item</li>
                                        <li class="">A fourth item</li>
                                        <li class="">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                    <div class="position-relative doctor-inner-box border border-info border-2 rounded" style="border-color: #17a2b8 !important">
                        <div class="content mt-3 text-center">
                            <h4 class="mb-0" style="padding-bottom: 5px"><a href="/tokoh/detail" style="color: #004e5a">VIP Room</a></h4>
                        </div>
                        <div class="doctor-profile">
                            <div class="doctor-img position-relative">
                                <img src="images/home/DRoom.jpg" alt="doctor-image"
                                    class="img-fluid w-100 border border-info border-4 rounded"
                                    style="border-color: #17a2b8 !important">

                                <!-- Overlay div -->
                                <div class="fasilitas-overlay">
                                    <p class="fasilitas-text">Fasilitas :</p>
                                    <ul class="fasilitas-text" data-bs-theme="">
                                        <li class="">An item</li>
                                        <li class="">A second item</li>
                                        <li class="">A third item</li>
                                        <li class="">A fourth item</li>
                                        <li class="">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 mb-4">
                    <div class="position-relative doctor-inner-box border border-info border-2 rounded" style="border-color: #17a2b8 !important">
                        <div class="content mt-3 text-center">
                            <h4 class="mb-0" style="padding-bottom: 5px"><a href="/tokoh/detail" style="color: #004e5a">Family Room</a></h4>
                        </div>
                        <div class="doctor-profile">
                            <div class="doctor-img position-relative">
                                <img src="images/home/familyroom.jpg" alt="doctor-image"
                                    class="img-fluid w-100 border border-info border-4 rounded"
                                    style="border-color: #17a2b8 !important">

                                <!-- Overlay div -->
                                <div class="fasilitas-overlay">
                                    <p class="fasilitas-text">Fasilitas :</p>
                                    <ul class="fasilitas-text" data-bs-theme="">
                                        <li class="">An item</li>
                                        <li class="">A second item</li>
                                        <li class="">A third item</li>
                                        <li class="">A fourth item</li>
                                        <li class="">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
        </div>
    </section>

</x-home.layout>
