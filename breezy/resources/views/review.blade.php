@extends('main')

@section('content')
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Review</span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $product->cart->product->photo) }}"
                                alt="">
                            <div class="product-action show-on-hover">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark btn-square" data-bs-toggle="modal"
                                    data-bs-target="#review{{ $product->cart->product->id }}">
                                    <i class="fas fa-star"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>Rp.{{ number_format($product->cart->product->price, 0, ',', '.') }}</h5>
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
                <!-- Modal -->
                <div class="modal fade" id="review{{ $product->cart->product->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('review.store') }}" method="POST">
                                    @csrf
                                    <div class="floating-form">
                                        <textarea name="review" id="" cols="30" rows="10" class="form-control @error('review') is-invalid @enderror rounded"  placeholder="Review"></textarea>
                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="product_id" id=""
                                            value="{{ $product->cart->product->id }}">
                                        <input type="number" name="rating" id="" class="form-control @error ('rating') is-invalid @enderror mt-3 rounded" placeholder="Rating">
                                        @error('rating')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
            @if (Auth::check() && Auth()->user()->role == 'admin')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Produk
                </button>
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <!-- Modal content for adding a new product goes here -->
            </div>
        </div>
    </div>
@endsection
