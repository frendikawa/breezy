<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Breezy Handmade</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="{{ asset('img/icon.png') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid bg-light mb-30 px-5 fixed-top" style="box-shadow: 2px -5px 8px 1px #0d74ea">
        <div class="px-5">
            <nav class="navbar navbar-expand bg-light navbar-light d-flex justify-content-between">
                <img class="navbar-nav" src="{{ asset('img/logo.png') }}" width="150px" style="padding: 10px;">
                <div class="navbar-nav">
                    <a href="#beranda" class="nav-item mx-3 landing">Beranda</a>
                    <a href="#produk" class="nav-item mx-3 landing">Produk</a>
                    <a href="#tentang-kami" class="nav-item mx-3 landing">Tentang kami</a>
                </div>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf <button type="submit" class="btn btn-primary">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                @endauth
            </nav>
        </div>
    </div>

    <section id="beranda">
        <div class="py-5 bg-light">
            <div class="pt-5">
                <div class="container-fluid pt-5">
                    <div class="row px-xl-5">
                        <div class="col-lg-8">
                            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0"
                                data-ride="carousel">
                                <div class="carousel-inner product-offer">
                                    <div class="carousel-item position-relative active" style="height: 430px;">
                                        <img class="position-absolute w-100 h-100" src="img/shop.jpg"
                                            style="object-fit: cover;">
                                        <div
                                            class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                            <div class="p-3" style="max-width: 700px;">
                                                <div class="title">
                                                    <h1 class="display-4 text-white animate__animated animate__fadeInDown"
                                                        style="margin-bottom: -10px">Breezy</h1>
                                                    <p class="animate__animated animate__fadeInUp">handmade</p>
                                                </div>
                                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Karya
                                                    handmade eksklusif, gaya unik & kualitas terbaik. Temukan keindahan
                                                    setiap detail!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="product-offer mb-30" style="height: 200px;">
                                <img class="img-fluid" src="img/bracelet.jpg" alt="">
                                <div class="offer-text">
                                    <h6 class="text-white text-uppercase">Gelang</h6>
                                    <h5 class="text-white mb-3">Special Offer</h5>
                                    <a href="" class="btn btn-primary">Beli sekarang</a>
                                </div>
                            </div>
                            <div class="product-offer mb-30" style="height: 200px;">
                                <img class="img-fluid" src="img/necklace.jpg" alt="">
                                <div class="offer-text">
                                    <h6 class="text-white text-uppercase">Kalung</h6>
                                    <h5 class="text-white mb-3">Orange Statement Lotus</h5>
                                    <a href="" class="btn btn-primary">Beli sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="produk"><br>
        <br>
        <br><br>
        <div class="container-fluid mt-3 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                    class="bg-secondary pr-3">Produk Kami</span></h2>
            <div class="row px-xl-5">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $product->photo) }}"
                                    alt="">
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="">{{ $product->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>Rp.{{ number_format($product->price, 0, ',', '.') }}</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <button type="button" class="bttn btn-outline-dark btn-square mx-1"
                                        data-bs-toggle="modal" data-bs-target="#detail{{ $product->id }}"><i
                                            class="fa fa-eye"></i>
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#review{{ $product->id }}"
                                        class="btn btn-outline-dark btn-square"><i class="fas fa-star"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="detail{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt=""
                                            width="300" class="mr-5">
                                        <div class="text">
                                            <p><b class="text-primary">Nama:</b> {{ $product->name }}</p>
                                            <p><b class="text-primary">Deskripsi:</b> {{ $product->description }}</p>
                                            <p><b class="text-primary">Kategori:</b> {{ $product->category->name }}
                                            </p>
                                            <p><b class="text-primary">Harga:</b>
                                                Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                                            <p><b class="text-primary">Stok:</b> {{ $product->stock }}</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="review{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt=""
                                            width="300" class="mr-5">
                                        <div class="text">
                                            <p>Nama Pengguna: {{$product}}</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="tentang-kami">
        <br>
        <br>
        <br>
        <div class="container-fluid py-5 bg-light">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                    class="bg-light pr-3">Tentang Kami</span></h2>
            <div class="row px-xl-5 px-5">
                <div class="d-flex px-5">
                    <div class="container p-2 px-5">
                        <p class="px-3  ">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Quam ad nesciunt eius architecto porro voluptatem quaerat consectetur inventore.
                            Doloribus facere minus laborum id nisi fuga odio, fugiat pariatur est,
                            exercitationem aliquam quaerat illum aspernatur eveniet, dicta alias iure eligendi ad.
                            <br><br>
                            Perferendis vitae ea error, repellendus assumenda, explicabo,
                            tempora tempore aperiam delectus non minus dolores nihil odio quo rem modi mollitia in quod.
                            <br><br>
                            Fugiat ex officia provident corporis dolorum sequi consectetur accusantium ab aspernatur
                            porro nemo vero,
                            exercitationem ratione temporibus eum?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid bg-light text-secondary mt-1">
        <div class="row px-xl-5 pt-5">
            <div class="d-flex">
                <div class="container" style="width: 30vw;position:relative; left: -20vw;">
                    <h5 class="text-secondary text-uppercase mb-4">Halo Breelove</h5>
                    <p class="mb-4">Breezy! Keindahan, keunikan, dan ketelitian dalam setiap sentuhan. Seni yang
                        memikat, produk yang mempesona.</p>
                </div>
                <div class="infos" style="position: relative; left: -5vw;">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Kepanjen, Malang</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Breezy@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="text-center">
                <p class="text-center text-secondary">
                    &copy; <a class="text-primary" href="#">2024 Breezy</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">Farah & Frendika</a>
                </p>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

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
