<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body id="loginBody">
    <div class="container">
        <h3>Login</h3>
        <div class="my-2 justify-content-center text-center">
            @if (session()->has('success'))
                <p class="text-success"> {!! session('success') !!}</p>
            @endif
            @if (session()->has('error'))
                <p class="text-danger"><i class="fas fa-times"></i>  {{session('error')}}</p>
            @endif
        </div>

        <form action="{{route('login.auth')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label text-muted">Email Address</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label text-muted">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" >
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-login">Login</button>
            </div>
            <div class="create-account text-center text-muted">
                Don't have an account yet? <a href="{{route('register')}}">Create one here!</a>
            </div>
        </form>
    </div>
</body>
</html>