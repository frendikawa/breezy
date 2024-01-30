@extends('main')
@section('content')
    <div class="container">
        @foreach ($trolis as $key => $item)
            <div class="card mb-3" style="max-width: 80vw;">
                <div class="row g-0 p-3 ">
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">

                            <img src="{{ asset('storage/' . $item->product->photo) }}" width="150px"
                                class="img-fluid rounded-start" alt="{{ $item->product->name }}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body d-flex justify-space-between">
                            <div class="text col-md-12">
                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-close" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $item->id }}"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('troli.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Konfirmasi hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center text-dark">Apakah Anda yakin ingin menghapus
                                    "{{ $item->product->name }}" ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">tutup</button>
                                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
            <div class="container">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-dollar"></i> Checkout
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cart.updateMultiple') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <p>Konfirmasi pembelian barang dibawah:</p>
                                    <table style="width: 31vw">
                                                @foreach ($trolis as $key => $item)
                                                    <tr>
                                                        <input type="hidden" name="cart_ids[]" id=""
                                                            value="{{ $item->id }}">
                                                        <td>{{ ++$key . '. ' }}</td>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>Rp. {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                                        <td>x{{ $item->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                    </table>
                                    <br>
                                    @php
                                        $totalPrice = 0;
                                        foreach ($trolis as $item) {
                                            $totalPrice += $item->product->price*$item->quantity;
                                        }
                                    @endphp
                                    <p>Total: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                                    <input type="hidden" name="total" value="{{ $totalPrice }}">
                                    <div class="mb-3">
                                        <label for="proof">Upload bukti pembayaran</label>
                                        <input type="file" name="proof" id="proof" class="form-control">
                                    </div>
                                    <div class="form-floating">
                                        <input type="text" name="address" id="" class="form-control" placeholder="Alamat">
                                        <label for="" class="form-label">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Beli</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
@endsection
