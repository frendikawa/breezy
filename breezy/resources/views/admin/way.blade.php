@extends('admin.admin')
@section('content')
    <div class="position-absolute" style="left: 24vw; top: 3vw; width: 72vw;">
        <h2 class="section-title d-flex justify-content-between position-relative text-uppercase mb-4">
            <span class="pr-3">Pesanan yang sudah dikirim, silahkan ditindak lanjuti</span>
        </h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pengguna
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Produk yang dibeli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bukti pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ways as $key=>$item)
                        <tr class="bg-white dark:bg-gray-800 ">
                            <th scope="row" class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-base">{{ ++$key }}</th>
                            <td class="px-3 py-2"><div class="d-flex align-items-center"><img src="{{ asset('storage/'.$item->cart->user->photo) }}" class="mx-2" width="30px" style="border-radius: 50%">{{ $item->cart->user->name }}</div></td> 
                            <td class="px-3 py-2">{{ $item->cart->product->name }}</td>
                            <td class="px-3 py-2 text-center">{{ $item->cart->quantity }}</td>
                            <td class="px-3 py-2">Rp. {{ number_format($item->cart->product->price, 0,',','.') }}</td>
                            <td class="px-3 py-2 d-flex justify-content-center"><img src="{{ asset('storage/'.$item->proof) }}" style="object-fit: cover; height: 80px; width: 80px"></td>
                            <td class="px-3 py-2">
                                <button data-modal-target="see{{ $item->id }}" data-modal-toggle="see{{ $item->id }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center me-1 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-500" type="button">
                                    <i class="fa-regular fa-eye" style="font-size: 17px"></i>
                                </button>

                                <button data-modal-target="update{{ $item->id }}" data-modal-toggle="update{{ $item->id }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-500" type="button">
                                    Selesai
                                </button>
                            </td>
                        </tr>

                        <div id="see{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-4xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/'.$item->cart->user->photo) }}" class="mx-2" width="50px" style="border-radius: 50%">
                                            <p>{{ $item->cart->user->name }}</p>
                                        </div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="see{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>
                                      <div class="p-4 md:p-5 space-y-4">
                                        <div class="wrapper d-flex">
                                            <div class="product d-flex flex-column">
                                                <img src="{{ asset('storage/'.$item->cart->product->photo) }}" class="mx-4" width="100px">
                                                <div class="text mx-4 my-3">
                                                    <h4 class="font-semibold text-gray-900 dark:text-white">{{ $item->cart->product->name }}</h4>
                                                    <p>Harga satuan: Rp. {{ number_format($item->cart->product->price, 0,',','.') }}</p>
                                                    <p>Jumlah yang dibeli: {{ $item->cart->quantity }}</p>
                                                    <p>Total yang harus dibayar: Rp. {{ number_format($item->total, 0,',','.') }}</p>
                                                    <p>Alamat pengiriman: {{$item->address}}</p>
                                                </div>
                                            </div>
                                            <div class="proof">
                                                <img src="{{ asset('storage/'.$item->proof) }}" width="400px">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="flex items-center p-4 md:p-5 rounded-b">
                                          <button data-modal-hide="see{{ $item->id }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tutup</button>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div id="update{{ $item->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah pesanan sudah diterima pelanggan?</h3>
                                        <form method="POST" action="{{ route('way.update', $item->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Sudah
                                            </button>
                                            <button data-modal-hide="update{{ $item->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Belum</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="reject{{ $item->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="reject{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin untuk menolak pesanan ini?</h3>
                                        <form method="POST" action="{{ route('payment.reject', $item->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Ya, saya yakin
                                            </button>
                                            <button data-modal-hide="reject{{ $item->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-end">
                {{ $ways->links('pagination::bootstrap-5') }}
            </div>
    </div>
@endsection