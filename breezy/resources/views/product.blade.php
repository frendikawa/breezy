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
                                <a class="btn btn-outline-dark btn-square" href="{{route('troli.index')}}"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <button type="button" class="btn btn-outline-dark btn-square" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $product->id }}">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-ouline-dark btn-square" type="submit"><i class="fa fa-trash"></i></button>
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
                                            <label for="" class="form-label">Nama Produk</label>
                                            <input type="text" name="name" id="" class="form-control"
                                                value="{{ $product->name }}">
                                            <label for="" class="form-label">Gambar</label>
                                            <input type="file" name="photo" id="" class="form-control">
                                            <label for="" class="form-label">Deskripsi</label>
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                                            <label for="" class="form-label">Harga</label>
                                            <input type="number" name="price" id="" class="form-control"
                                                value="{{ $product->price }}">
                                            <label for="" class="form-label">Stock</label>
                                            <input type="number" name="stock" id="" class="form-control"
                                                value="{{ $product->stock }}">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Produk
            </button>

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
