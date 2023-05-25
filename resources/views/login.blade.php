<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login page</h1>

    <!-- resources/views/login.blade.php -->

<form method="POST" action="{{ route('auth') }}">
    @csrf

    <div>
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" required autofocus>
        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
    </div>

    <div>
        <label for="password">Senha</label>
        <input id="password" type="password" name="password" required>
        @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
    </div>

    <div>
        <button type="submit">Entrar</button>
    </div>
</form>

</body>
</html>