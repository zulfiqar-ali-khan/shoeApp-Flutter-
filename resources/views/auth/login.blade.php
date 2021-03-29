<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Sixer | Login</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <style>
        body{
            background:url('{{asset("shoe.jpg")}}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat
        }
    </style>

</head>

<body class="gray-bg" style="backgorud-image:url('{{asset('shoe.jpg')}}')">

    <div class="loginColumns animated fadeInDown">
    <div class="row" style="background:#eee;padding:20px;">    

            <div class="col-md-6 text-justify">
                <h2 class="font-bold">Welcome To Sixer</h2>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">
                            {{ __('Login') }}
                        </button>

                        {{-- <a href="#">
                            <small>Forgot password?</small>
                        </a> --}}

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copy right Keen Tech
            </div>
            <div class="col-md-6 text-right">
               <small>© 2020-2021</small>
            </div>
        </div>
    </div>

</body>

</html>
