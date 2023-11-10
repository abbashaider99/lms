<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body id="loginBody">
    <div class="container">
        <h3>Register</h3>
        <div class="my-2 justify-content-center text-center">
            @if (session()->has('success'))
                <strong class="text-success">{{ session('success')}}</strong>
            @endif
            @if (session()->has('error'))
                <strong class="text-danger">{{session('error')}}</strong>
            @endif
        </div>

        <form action="{{route('register.user')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label text-muted">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label text-muted">Email Address</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label text-muted">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Create password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label text-muted">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>            

            <div class="form-group">
                <button class="btn btn-login">Create an account</button>
            </div>
            <div class="create-account text-center text-muted">
                Already have an account? <a href="{{route('login')}}">Login here!</a>
            </div>
        </form>
    </div>
</body>
</html>