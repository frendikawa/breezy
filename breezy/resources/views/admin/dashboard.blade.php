@extends('admin.admin')
@section('content')
    <div class="position-absolute" style="left: 24vw; top: 3vw; width: 72vw;">
        <div class="mb-5">
            <div class="d-flex mb-5">
                <a href="{{ route('confirmation.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-2">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><i
                            class='bx bxs-shopping-bags'></i> Menunggu konfirmasi</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ \App\Models\Payment::where('status', 'Menunggu konfirmasi')->count() }} Pesanan</p>
                </a>
                <a href="{{ route('agree.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-2">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><i
                            class='bx bx-badge-check'></i> Pesanan diterima</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ \App\Models\Payment::where('status', 'diterima')->count() }} Pesanan</p>
                </a>
                <a href="{{ route('reject.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-2">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><i
                            class='bx bx-x-circle'></i> Pesanan ditolak</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ \App\Models\Payment::where('status', 'ditolak')->count() }} Pesanan</p>
                </a>
                <a href="{{ route('way.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-2">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><i
                            class='bx bx-car'></i> Dalam perjalanan</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ \App\Models\Payment::where('status', 'Dalam perjalanan')->count() }} Pesanan</p>
                </a>
                <a href="{{ route('done.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-2">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><i
                            class='bx bxs-badge-check'></i> Pesanan selesai</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ \App\Models\Payment::where('status', 'Selesai')->count() }} Pesanan</p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    {!! $chart->container() !!}</div>
            </div>
        </div>



        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="text-uppercase">Sosial media</h2>
                <button data-modal-target="sosmed" data-modal-toggle="sosmed"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1.5 py-1 text-center mx-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <i class='bx bx-plus-circle'></i>
                </button>
            </div>
            <div class="d-flex align-items-center">
                @foreach ($sosmeds as $item)
                    <div class="border-2 p-3 rounded-lg flex">
                        <a href="https://{{ $item->link }}" target="_blank" class="flex">
                            <img src="{{ asset('storage/' . $item->icon) }}"
                                style="object-fit: cover; width:40px; height:40px; border-radius:50%">
                            <div class="block mx-3">
                                <p>{{ $item->name }}</p>
                            </div>
                        </a>
                        <div class="flex">
                            <button data-modal-target="Editsosmed{{ $item->id }}"
                                data-modal-toggle="Editsosmed{{ $item->id }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1.5 py-1 text-center mx-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <i class='bx bxs-edit-alt'></i>
                            </button>

                            <div id="Editsosmed{{ $item->id }}" data-modal-backdrop="static" tabindex="-1"
                                aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Sosial media baru
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="Editsosmed{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('sosmed.update', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="p-4 md:p-5 space-y-1">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column mb-3">
                                                        <label for="icon" class="mb-1">Ikon sosial media</label>
                                                        <input type="file"
                                                            class=" @error('icon') is-invalid @enderror rounded-lg border-2"
                                                            name="icon" placeholder="icon">
                                                        @error('icon')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror rounded-lg"
                                                            id="floatingInput" placeholder="Nama sosial media"
                                                            name="name" value="{{ old('name', $item->name) }}">
                                                        <label for="floatingInput">Nama sosial media</label>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('link') is-invalid @enderror rounded-lg"
                                                            id="floatingInput" placeholder="Link sosial media"
                                                            name="link" value="{{ old('link', $item->link) }}">
                                                        <label for="floatingTextarea">Link</label>
                                                        @error('link')
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
                                                <button data-modal-hide="Editsosmed{{ $item->id }}" type="button"
                                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button data-modal-target="Deletesosmed{{ $item->id }}"
                                data-modal-toggle="Deletesosmed{{ $item->id }}"
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1 text-center mx-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                <i class='bx bx-trash'></i>
                            </button>
                        </div>
                    </div>

                    <div id="Deletesosmed{{ $item->id }}" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="Deletesosmed{{ $item->id }}">
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
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda
                                        yakin untuk menghapus postingan ini?</h3>
                                    <form method="POST" action="{{ route('sosmed.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Ya, saya yakin
                                        </button>
                                        <button data-modal-hide="Deletesosmed{{ $item->id }}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <br><br>
        <br>
        <h2 class="section-title d-flex justify-content-between position-relative text-uppercase mb-4">
            <span class="pr-3">Postingan</span>
            <button data-modal-target="add" data-modal-toggle="add"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Postingan baru
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
                            Gambar postingan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul postingan
                        </th>
                        <th scope="col" colspan="3" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carousels as $key => $item)
                        <tr class="bg-white dark:bg-gray-800 text-center">
                            <th scope="row"
                                class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-base">
                                {{ ++$key }}</th>
                            <td><img src="{{ asset('storage/' . $item->foto) }}" class="py-3"
                                    style="object-fit: cover; width: 100px; height: 100px"></td>
                            <td>{{ $item->judul }}</td>
                            <td colspan="3" style="width: 14pc; padding: 0 10px">{{ $item->deskripsi }}</td>
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
                                            Postingan baru
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="add">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <form action="{{ route('dashboard.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="p-4 md:p-5 space-y-1">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text"
                                                        class="form-control @error('judul') is-invalid @enderror rounded-lg"
                                                        id="floatingInput" placeholder="kategori" name="judul"
                                                        value="{{ old('judul', $item->judul) }}">
                                                    <label for="floatingInput">Judul postingan</label>
                                                    @error('judul')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-3">
                                                    <label for="foto" class="mb-1">Foto postingan</label>
                                                    <input type="file"
                                                        class=" @error('foto') is-invalid @enderror rounded-lg"
                                                        name="foto" placeholder="foto">
                                                    @error('judul')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror rounded-lg" name="deskripsi"
                                                        placeholder="Deskripsi" id="floatingTextarea">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                                                    <label for="floatingTextarea">Deskripsi</label>
                                                    @error('deskripsi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center p-4 md:p-5 rounded-b">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                            <button data-modal-hide="add" type="button"
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
                                            yakin untuk menghapus postingan ini?</h3>
                                        <form method="POST" action="{{ route('dashboard.destroy', $item->id) }}">
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
        </div>

        <div id="sosmed" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Sosial media baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="sosmed">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('sosmed.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="p-4 md:p-5 space-y-1">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex flex-column mb-3">
                                    <label for="icon" class="mb-1">Ikon sosial media</label>
                                    <input type="file" class=" @error('icon') is-invalid @enderror rounded-lg border-2"
                                        name="icon" placeholder="icon">
                                    @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="Nama sosial media" name="name"
                                        value="{{ old('name') }}">
                                    <label for="floatingInput">Nama sosial media</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('link') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="Link sosial media" name="link"
                                        value="{{ old('link') }}">
                                    <label for="floatingTextarea">Link</label>
                                    @error('link')
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
                            <button data-modal-hide="sosmed" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="add" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Postingan baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="add">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="p-4 md:p-5 space-y-1">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('judul') is-invalid @enderror rounded-lg"
                                        id="floatingInput" placeholder="Judul" name="judul"
                                        value="{{ old('judul') }}">
                                    <label for="floatingInput">Judul postingan</label>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <label for="foto" class="mb-1">Foto postingan</label>
                                    <input type="file"
                                        class=" @error('foto') is-invalid @enderror rounded-lg border-2" name="foto"
                                        placeholder="foto">
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror rounded-lg" name="deskripsi"
                                        placeholder="Deskripsi" id="floatingTextarea">{{ old('deskripsi') }}</textarea>
                                    <label for="floatingTextarea">Deskripsi</label>
                                    @error('deskripsi')
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

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
