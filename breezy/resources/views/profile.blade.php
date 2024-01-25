@extends('main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body d-flex">
                <div class="text">
                    <p><img src="{{ asset('storage/' . $user->photo) }}" alt="ini foto profil anda" width="100" height="100" class="rounded-circle"></p>
                    <p>Nama: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <!-- Button trigger modal -->
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#updateprofile{{ $user->id }}">
                Update Profile
            </button>

            <!-- Modal -->
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
                                    <input type="file" name="photo" id="" class="form-control">
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="floatingInput" placeholder="nama" name="name"
                                        value="{{ old('name', $user->name) }}">
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
        </div>
    @endsection
