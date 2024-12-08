<header>
    <nav class="navbar navbar-expand-lg navigation fixed-top my-bg" id="navbar" style="color: white;"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#" style="margin-top: 0%">
                <img src="{{ asset('NusantaraConnect.png') }}" alt="" class="img-fluid w-50">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('booking') ? 'active' : '' }}" href="/booking">Booking</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item dropdown profil" style="margin: 0% 10px">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfil" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('favicon.ico') }}" alt="" class="img-fluid w-50 rounded-circle"
                                style="background: white">
                            <i class="icofont-thin-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownProfil">
                            <li class="dropdown-item choice-main">{{ Auth::user()->nama_lengkap }}
                                ({{ Auth::user()->nama_panggilan }})</li>
                            <li class="dropdown-item choice-main">
                                @if (Auth::user()->role == "admin")
                                    <a href="/admin/dashboard">{{ Auth::user()->role }}</a>
                                @elseif (Auth::user()->role == "resepsionis")
                                    <a href="/resepsionis/dashboard">{{ Auth::user()->role }}</a>
                                @elseif (Auth::user()->role == "resepsionis")
                                    {{ Auth::user()->role }}
                                @endif
                                </li>
                            <li class="dropdown-item choice-drop"><a href="#"><i class="fa-solid fa-user"></i>
                                    Profil</a></li>
                            <li class="dropdown-item choice-drop"><a href="/home/bookingku"><i
                                        class="fa-solid fa-cart-shopping"></i> Pesananku</a></li>
                            <li class="dropdown-item choice-drop"><a href="/home/add"><i
                                        class="fa-solid fa-user-plus"></i> Tambah Orang</a></li>
                            <li class="dropdown-item logout">
                                <form action="{{ route('logout') }}" method="POST" class="d-flex">
                                    @csrf
                                    <button type="submit" class="b-logout">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
