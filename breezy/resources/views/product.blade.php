@extends('main')

@section('content')
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
                            <div class="product-action">
                                <form action="{{ route('troli.store', $product->id) }}" method="POST">
                                    <button type="submit" class="btn btn-outline-dark btn-square">
                                        <i class="fa fa-shopping-cart"></i></a>
                                    </button>
                                </form>
                                <button type="button" class="btn btn-outline-dark btn-square" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $product->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-square" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $product->id }}">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-dark btn-square" type="submit"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ $product->price }}</h5>
                                <h6 class="text-muted ml-2"><del>Rp. 100.000</del></h6>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body d-flex">
                                            <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="500" class="mr-5">
                                            <div class="text">
                                                <p>Nama: {{ $product->name }}</p>
                                                <p>Deskripsi: {{ $product->description }}</p>
                                                <p>Kategori: {{ $product->category_id }}</p>
                                                <p>Harga: {{ $product->price }}</p>
                                                <p>Stok: {{ $product->stock }}</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </div>
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
                                            <div class="mt-3">
                                                <label for="" class="form-label">Nama Produk</label>
                                                <input type="text" name="name" id="" class="form-control"
                                                    value="{{ $product->name }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="" class="form-label">Gambar</label>
                                                <input type="file" name="photo" id="" class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <label for="" class="form-label">Deskripsi</label>
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                                            </div>
                                            <div class="mt-3">
                                                <label for="" class="form-label">Harga</label>
                                                <input type="number" name="price" id="" class="form-control"
                                                    value="{{ $product->price }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="" class="form-label">Kategori</label>
                                                <select name="category_id" id="" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mt-3">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" id="" class="form-control"
                                                    value="{{ $product->stock }}">
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
                                        <label for="" class="form-label">Gambar produk</label>
                                        <input type="file" name="photo" id="" class="form-control">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" id="" class="form-control">
                                        <label for="" class="form-label">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                        <label for="" class="form-label">Kategori</label>
                                        <select name="category_id" id="" class="form-control">
                                            <option disabled selected value="">Pilih kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="" class="form-label">Price</label>
                                        <input type="number" name="price" id="" class="form-control">
                                        <label for="" class="form-label">Stock</label>
                                        <input type="number" name="stock" id="" class="form-control">
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
        @endsection
