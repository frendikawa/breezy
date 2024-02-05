@extends('main')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Produk</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#product{{ $item->id }}">
                                <i class="fa fa-eye rounded"></i>
                            </button>
                        </td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    <div class="modal fade" id="product{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($item->detailPayments as $detailPayment)
                                        {{-- {{$detailPayment->cart->user->name}} --}}
                                        <img src="{{ asset('storage/' . $detailPayment->cart->product->photo) }}"
                                            class="mx-4 img-fluid" width="100px">
                                        <div class="text mx-4 my-3">
                                            <h4 class="font-semibold text-gray-900 dark:text-white">
                                                {{ $detailPayment->cart->product->name }}</h4>
                                            <p>Harga satuan: Rp.
                                                {{ number_format($detailPayment->cart->product->price, 0, ',', '.') }}
                                            </p>
                                            <p>Jumlah yang dibeli: {{ $detailPayment->cart->quantity }}</p>
                                        </div>
                                    @endforeach
                                    <p>Total harga:{{$item->total}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
