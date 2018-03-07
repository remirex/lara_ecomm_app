<html>
<head>
    <meta charset="UTF-8">
    <title>Please Log in</title>


    <!-- load fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}" type="text/css">

    <!-- load styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link href="{{asset('lightbox/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
</head>
<body>

<div class="login-admin">

    <h3 class="text-center">Regie Online</h3>
    <h5 class="text-center" style="color: gray">Log in to manage your store</h5>
    <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="button">
                Login
            </button>

            <a  href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </form>
</div>
</body>
</html>






