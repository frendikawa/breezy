<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Masuk</title>
</head>
<body class="bg-light">
    <div class="pembungkus container bg-light">
        <div class="left">
            <div class="wrapper">
                <img src="{{ asset('img/logo-center.png') }}" width="150px">
            </div>
        </div>
        <div class="right">
            <div class="choose mb-2">
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Masuk</a> /
                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Daftar</a>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" name="password" placeholder="password">
                    <label for="floatingInput">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mt-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
    
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>