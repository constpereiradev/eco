<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Login</title>
</head>
<body>
    <div class="login">


        <h2>Welcome back!</h2>
        @if(session('message'))
            <div class="login-alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif


        <div class="login-form">

            <form method="POST" action="{{ route('auth') }}">
                @csrf
            
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            
                <div>
                    <button type="submit">Login</button>
                </div>

                
            </form>
            
        </div>
        <p>don't you have an account? <a href="register">register</a></p>
    </div>



</body>
</html>