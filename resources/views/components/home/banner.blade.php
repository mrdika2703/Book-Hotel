<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
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
    </div>
    <div class="carousel-inner">
        @if (!empty($fasilitas))
            @forelse ($fasilitas as $fasilitas)
            <div class="carousel-item active">
                <img src="{{ asset('storage/' . $fasilitas->foto1) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $fasilitas->nama_fasilitas }}</h5>
                    <p>{{ $fasilitas->deskripsi_fasilitas }}</p>
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="object-fit-none">
    <div class="gradienthome"></div>
</div>
