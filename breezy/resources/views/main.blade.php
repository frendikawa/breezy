<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Breezy Handmade</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/icon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light mb-30">
        <div class="row px-xl-5">
            <div style="width: 100vw">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <img src="{{ asset('img/logo.png') }}" width="150px" style="padding: 10px;">
                    <div class="collapse navbar-collapse justify-content-between px-5" style="width: 30vw"
                        id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('home') }}"
                                class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                            <a href="{{ route('product.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">Produk</a>
                            <div class="nav-item dropdown">
                                <a href="{{ route('category.index') }}" style="cursor: default"
                                    class="nav-link {{ request()->routeIs('category') ? 'active' : '' }}">Kategori</a>
                                <div class="dropdown-content">
                                    @foreach (DB::table('categories')->get() as $item)
                                        <a href="{{ route('category.show', $item->id) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('contact') }}"
                                class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak
                                kami</a>
                        </div>
                        <div class="d-flex">
                            <form action="" style="padding-right: 10px">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari..">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('order.index') }}" class="btn px-0 ml-3">
                                        <i class="fa-solid fa-clipboard-list"></i>
                                        @php
                                            $totalData = \App\Models\Payment::all()->count();
                                        @endphp
                                        <span class="badge text-secondary border border-secondary rounded-circle"
                                            style="padding-bottom: 2px;">{{ $totalData }}</span>
                                    </a>
                                @else
                                    <a href="{{ route('troli.index') }}" class="btn px-0 ml-3">
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                        @php
                                            $userId = Auth::id();
                                            $totalData = \App\Models\Cart::where('user_id', $userId)->count();
                                        @endphp
                                        <span class="badge text-secondary border border-secondary rounded-circle"
                                            style="padding-bottom: 2px;">{{ $totalData }}</span>
                                    </a>
                                @endif
                                <div class="btn-group" style="position: relative; left: 4px;">
                                    @if (Auth::check())
                                        <div class="dropdown">
                                            <a href="{{ route('profile.index') }}">
                                                <i class="fa-solid fa-circle-user"
                                                    style="font-size: 25px; position: relative; top:3px; left: 3px"></i>
                                            </a>
                                            <div class="dropdown-content">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="text-primary" style=" padding-left: 10px; border:none; background: none;">Keluar</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    {{-- Content Start --}}
    <section>
        @yield('content')
    </section>
    {{-- Content End --}}

    <!-- Footer Start -->
    <div class="container-fluid bg-light text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Halo Breelove</h5>
                <p class="mb-4">Breezy! Keindahan, keunikan, dan ketelitian dalam setiap sentuhan. Seni yang memikat,
                    produk yang mempesona.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Kepanjen, Malang</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Breezy@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Navigasi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{ route('home') }}"><i
                                    class="fa fa-angle-right mr-2"></i>Beranda</a>
                            <a class="text-secondary mb-2" href="{{ route('product.index') }}"><i
                                    class="fa fa-angle-right mr-2"></i>Produk kami</a>
                            <a class="text-secondary mb-2" href="{{ route('contact') }}"><i
                                    class="fa fa-angle-right mr-2"></i>Kontak kami</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        @if (Auth::check())
                            <h5 class="text-secondary text-uppercase mb-4">Akun saya</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="{{ route('profile.index') }}"><i class="fa fa-angle-right mr-2"></i>Lihat
                                    akun</a>
                                <a class="text-secondary mb-2" href="{{ route('troli.index') }}"><i class="fa fa-angle-right mr-2"></i>Keranjang</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-secondary mb-2" style="background: none; border:none; "><i
                                        class="fa fa-angle-right mr-2"></i>Keluar</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-5">
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Breezy</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">Farah & Frendika</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
