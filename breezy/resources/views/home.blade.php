@extends('main')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men
                                        Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                        lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Beli sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women
                                        Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                        lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Beli sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids
                                        Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                        lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Beli sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Diskon 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Beli sekarang</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Diskon 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Beli sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produk berkualitas</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Gratis ongkir</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa-solid fa-hand-holding-dollar text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Support COD</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa-solid fa-arrow-trend-down text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Ekonomis</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

     <!-- Categories Start -->
     <div class="container-fluid pt-5">
         <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Kategori produk</span></h2>
         <div class="row px-xl-5 pb-3">
             @foreach ($categories as $item)
                @php
                    $kategori = $item->id;
                    $totalData = \App\Models\Product::where('category_id', $kategori)->count();
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ asset('img/logo-center.png') }}" width="80px" style="padding: 5px 5px">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $item->name }}</h6>
                                <small class="cat-count">{{ $totalData }} Produk</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Produk
            Kami</span></h2>
    <div class="row px-xl-5">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $product->photo) }}" alt="">
                        <div class="product-action show-on-hover">
                            @if (Auth::check() && Auth()->user()->role == 'admin')
                                <button type="button" class="btn btn-outline-dark btn-square mx-1" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $product->id }}">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-square mx-1"
                                    data-bs-toggle="modal" data-bs-target="#delete{{ $product->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif

                            <button type="button" class="btn btn-outline-dark btn-square mx-1" data-bs-toggle="modal"
                                data-bs-target="#detail{{ $product->id }}">
                                <i class="fa fa-eye"></i>
                            </button>
                            
                            <form action="{{ route('troli.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                <button type="submit" class="btn btn-outline-dark btn-square">
                                    <i class="fa fa-shopping-cart"></i></a>
                                </button>
                            </form>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                    penghapusan?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus {{ $product->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp.{{ number_format($product->price, 0, ',', '.') }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="detail{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="300"
                                        class="mr-5">
                                    <div class="text">
                                        <p><b class="text-primary">Nama:</b> {{ $product->name }}</p>
                                        <p><b class="text-primary">Deskripsi:</b> {{ $product->description }}</p>
                                        <p><b class="text-primary">Kategori:</b> {{ $product->category->name }}</p>
                                        <p><b class="text-primary">Harga:</b> Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                                        <p><b class="text-primary">Stok:</b> {{ $product->stock }}</p>
                                    </div>
                                </div>
                        </div>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="update{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Gambar produk</label>
                                            <input class="form-control @error('photo') is-invalid @enderror"
                                                type="file" id="photo" name="photo">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="floatingInput" placeholder="Nama produk" name="name"
                                                value="{{ $product->name }}">
                                            <label for="floatingInput">Nama produk</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="deskripsi" name="description"
                                                style="height: 150px">{{ $product->description }}</textarea>
                                            <label for="floatingInput">Deskripsi</label>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number"
                                                class="form-control @error('price') is-invalid @enderror"
                                                id="floatingInput" placeholder="harga" name="price"
                                                value="{{ $product->price }}">
                                            <label for="floatingInput">Harga</label>
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number"
                                                class="form-control @error('stock') is-invalid @enderror"
                                                id="floatingInput" placeholder="stok" name="stock"
                                                value="{{ $product->stock }}">
                                            <label for="floatingInput">Stok</label>
                                            @error('stock')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select @error('category_id') is-invalid @enderror"
                                                name="category_id" aria-label="Default select example">
                                                <option selected>- Kategori -</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                            <label for="category_id">Kategori</label>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Button trigger modal -->
        @if (Auth::check() && Auth()->user()->role == 'admin')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Produk
            </button>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form penambahan produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Gambar produk</label>
                                        <input class="form-control @error('photo') is-invalid @enderror"
                                            type="file" id="photo" name="photo">
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="floatingInput" placeholder="Nama produk" name="name"
                                            value="{{ old('name') }}">
                                        <label for="floatingInput">Nama produk</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="deskripsi" name="description"
                                            style="height: 150px">{{ old('description') }}</textarea>
                                        <label for="floatingInput">Deskripsi</label>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            class="form-control @error('price') is-invalid @enderror"
                                            id="floatingInput" placeholder="harga" name="price"
                                            value="{{ old('price') }}">
                                        <label for="floatingInput">Harga</label>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            class="form-control @error('stock') is-invalid @enderror"
                                            id="floatingInput" placeholder="stok" name="stock"
                                            value="{{ old('stock') }}">
                                        <label for="floatingInput">Stok</label>
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            name="category_id" aria-label="Default select example">
                                            <option selected>- Kategori -</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="category_id">Kategori</label>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan produk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
