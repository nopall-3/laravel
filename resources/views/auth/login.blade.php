<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"
        href="https://play-lh.googleusercontent.com/FcRZx_UEXN2uc7uKM5EKGn7Jmb65c8VVELlmligxdfUcjKKIpzFX0SHXFePllD2g4ik">
    <title>TIX ID</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lexend+Deca:wght@100..900&display=swap"
        rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <form class="w-50 d-block mx-auto my-5" method="POST" action="{{ Route('auth') }}">
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success my-3">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (session::get('ok'))
            <div class="alert alert-succes">{{ session::get('ok') }}</div>
        @endif
        @if (session::get('error'))
            <div class="alert alert-danger">{{ session::get('error') }}</div>
        @endif


        <!-- Email input -->
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="form1Example1" class="form-control @error('email') is-invalid @enderror"
                name="email" />
            <label class="form-label" for="form1Example1">Email address</label>
        </div>

        <!-- Password input -->
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="form1Example2" class="form-control @error('password') is-invalid @enderror"
                name="password" />
            <label class="form-label" for="form1Example2">Password</label>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">LOGIN</button>
        <div class="text-center mt-3">
            <a href="{{ route('home') }}">Kembali</a>
        </div>
    </form>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.1.0/mdb.umd.min.js"></script>
</body>

</html>
