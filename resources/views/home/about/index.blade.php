<x-home.layout>

    <div class="breaknav"></div>

    <section class="page-title bg-1 position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.5; background: #004e5a;"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center position-relative" style="z-index: 2;">
                        <span class="text-white d-block"></span>
                        <h1 class="text-capitalize mb-5 text-lg text-white">About</h1>

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

    <br><br>

    <section class="section about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="title-color">HotelDK Booking</h2>
                </div>
                <div class="col-lg-8">
                    <p>HotelDK adalah hotel berfasiitas premium yang memiliki harga terjangkau untuk anda yang ingin bersinggah sekaligus berliburan. Dengan 10 menit anda bisa menuju ke pantai yang indah atau kami juga menyediakan kolam renang mewah dengan kedalaman sampai 3M dan untuk anak-anak juga terdapat kolam renang khusus.</p>
                </div>
            </div>
            <div class="mb-5">
                <div class="">
                    <div class="text-center">
                        <p>Dengan harga terjangkau anda bisa mendapatkan fasilitas kamar yang memanjakan anda. Mulai dari sarapan gratis, akses internet 24 jam dengan kecepatan sampai 1GBps, Restaurant mewah dengan pemandangan sunrise yang indah. Jangan takut kehabisan karena kami memiliki 200 kamar dengan fasilitas unggul yang bisa anda nikmati 24 jam.</p>
    
                        <p>HotelDK terbuka untuk anda 24 jam dan siap melayani anda kapan pun selama anda berada di HotelDK. Untuk anda yang berkeluarga jangan takut karena kami memiliki 4 jenis kamar, Deluxe siap melayani secara istimewa, Family menyediakan kasur yang besar, Twin dengan 2 kasur, dan Single dengan harga terjangkau dan fasilitas yang memanjakan. Segera pesan hotel anda dan buat diri anda termanjakan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <section class="section testimonial visit mb-5" style="padding: 15 0">
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
                        <a href="/booking"
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

    <section class="section team">
        <div class="container">

            <div class="row justify-content-center">
                @if (!empty($fasilitas))
                    @forelse ($fasilitas as $fasilitas)
                        <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                            <div class="position-relative doctor-inner-box">
                                <div class="doctor-profile">
                                    <div class="doctor-img ratio ratio-21x9">
                                        <img src="{{ asset('storage/' . $fasilitas->foto1) }}" alt="doctor-image"
                                            class="img-fluid w-100 border border-info border-4 rounded"
                                            style="border-color: #17a2b8 !important">
                                    </div>
                                </div>
                                <div class="content mt-3 text-center">
                                    <h4 class="mb-0"><a href="/tokoh/detail"
                                            style="color: #004e5a">{{ $fasilitas->nama_fasilitas }}</a>
                                    </h4>
                                    <p>{{ $fasilitas->deskripsi_fasilitas }}</p>
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
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
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
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
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
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
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
                                    <h4 class="mb-0"><a href="/tokoh/detail" style="color: #004e5a">Sarapan Gratis</a>
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

    <br>
    <br>
    
</x-home.layout>