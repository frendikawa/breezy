@extends('main')
@section('content')
    <section class="vh-100" style="background-color: #ffffff;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 15px; background-color: #ffffff;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="" height="45"
                                    width="45" class="rounded-circle overflow-hidden">
                            @else
                                <i class="fa-solid fa-circle-user"
                                    style="font-size: 25px; position: relative; top:3px; left: 3px"></i>
                            @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Pembeli</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">Pembelian</p>
                                            <p class="mb-0">
                                                {{ \App\Models\Cart::where('user_id', $user->id)->where('status', 'beli')->count() }}
                                            </p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Rating</p>
                                            <p class="mb-0">{{ \App\Models\Review::where('user_id', $user->id)->count() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateprofile{{ $user->id }}">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="modal fade" id="updateprofile{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="" class="form-label">Foto Profil</label>
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="" height="45"
                                    width="45" class="rounded-circle overflow-hidden">
                            @else
                                <i class="fa-solid fa-circle-user"
                                    style="font-size: 25px; position: relative; top:3px; left: 3px"></i>
                            @endif
                            <input type="file" name="photo" id="" class="form-control">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="floatingInput" placeholder="nama" name="name" value="{{ old('name', $user->name) }}">
                            <label for="floatingInput">Nama</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" name="password" id=""
                                class="form-control @error('password') is-invalid 
                        @enderror"
                                placeholder="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="">Password baru</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" name="password_confirmation" id="" class="form-control"
                                placeholder="konfirmasi password">
                            <label for="">Konfirmasi password</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
