@extends('admin.admin')
@section('content')
    <div class="position-absolute" style="left: 24vw; top: 3vw; width: 72vw;">
        <h2 class="section-title d-flex justify-content-between position-relative text-uppercase mb-4">
            <span class="pr-3">Daftar Produk</span>
            <button data-modal-target="add" data-modal-toggle="add"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Produk baru
            </button>
        </h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Foto produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga/pcs
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi produk
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $item)
                        <tr class="bg-white dark:bg-gray-800 text-center">
                            <th scope="row"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-base">
                                {{ ++$key }}</th>
                            <td><img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="py-3"
                                    style="object-fit: cover; width: 100px; height: 100px"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->stock, 0, ',', '.') }}</td>
                            <td style="width: 10pc; padding: 0 10px">{{ $item->description }}</td>
                            <td>
                                <button data-modal-target="edit{{ $item->id }}"
                                    data-modal-toggle="edit{{ $item->id }}"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-500"
                                    type="button">
                                    <i class="fa-solid fa-pen-to-square" style="font-size: 17px"></i>
                                </button>

                                <button data-modal-target="delete{{ $item->id }}"
                                    data-modal-toggle="delete{{ $item->id }}"
                                    class="text-red-600 hover:text-white border border-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center me-2 mb-2 dark:border-red-800 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-500"
                                    type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>

                        <div id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit produk
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="edit{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        <div class="p-4 md:p-5 space-y-4">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex flex-column mt-3">
                                                <label for="photo" class="mb-1">Foto produk</label>
                                                <img src="{{asset('storage/'.$item->photo)}}" alt="" class="img-fluid w-50 mb-3 justify-content-center">
                                                <input type="file" class=" @error('photo') is-invalid @enderror rounded-lg" id="floatingInput" placeholder="photo" name="photo"
                                                    value="{{ old('photo') }}">
                                                @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mt-3">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror rounded-lg"
                                                    id="floatingInput" placeholder="nama" name="name"
                                                    value="{{ old('name', $item->name) }}">
                                                <label for="floatingInput">Nama</label>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mt-3">
                                                <input type="text"
                                                    class="form-control @error('description') is-invalid @enderror rounded-lg"
                                                    id="floatingInput" placeholder="kategori" name="description"
                                                    value="{{ old('description', $item->description) }}">
                                                <label for="floatingInput">Deskripsi</label>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mt-3">
                                                <input type="text"
                                                    class="form-control @error('price') is-invalid @enderror rounded-lg"
                                                    id="floatingInput" placeholder="harga" name="price"
                                                    value="{{ old('price', $item->price) }}">
                                                <label for="floatingInput">Harga</label>
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mt-3">
                                                <input type="text"
                                                    class="form-control @error('stock') is-invalid @enderror rounded-lg"
                                                    id="floatingInput" placeholder="stok" name="stock"
                                                    value="{{ old('stock', $item->stock) }}">
                                                <label for="floatingInput">Stok</label>
                                                @error('stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mt-3">
                                                <select name="category_id" id="" class="form-control">
                                                    <option value="">- Kategori -</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingInput">Kategori</label>
                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex items-center p-4 md:p-5 rounded-b">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                            <button data-modal-hide="edit{{ $item->id }}" type="button"
                                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="delete{{ $item->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="delete{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda
                                            yakin untuk menghapus produk {{ $item->name }}?</h3>
                                        <form method="POST" action="{{ route('product.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Ya, saya yakin
                                            </button>
                                            <button data-modal-hide="delete{{ $item->id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="d-justify-content-end">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <div id="add" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Produk baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="add">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">tutup</span>
                        </button>
                    </div>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="p-4 md:p-5 space-y-1">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex flex-column">
                                    <label for="photo" class="mb-1">Foto produk</label>
                                    <input type="file" class=" @error('photo') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="photo" name="photo"
                                        value="{{ old('photo') }}">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="nama" name="name"
                                        value="{{ old('name') }}">
                                    <label for="floatingInput">Nama</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text"
                                        class="form-control @error('description') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="kategori" name="description"
                                        value="{{ old('description') }}">
                                    <label for="floatingInput">Deskripsi</label>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text"
                                        class="form-control @error('price') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="harga" name="price"
                                        value="{{ old('price') }}">
                                    <label for="floatingInput">Harga</label>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text"
                                        class="form-control @error('stock') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="stok" name="stock"
                                        value="{{ old('stock') }}">
                                    <label for="floatingInput">Stok</label>
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mt-3">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">- Kategori -</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingInput">Kategori</label>
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center p-4 md:p-5 rounded-b">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan</button>
                            <button data-modal-hide="add" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
