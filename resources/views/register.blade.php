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


        <h2>Welcome!</h2>

        <div class="login-form">

            <form method="POST" action="{{ route('create.user') }}">
                @csrf
            
                <div>
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" required autofocus>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus>
                </div>
            
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
            
                <div>
                    <button type="submit">Register</button>
                </div>

                
            </form>
            
        </div>
        <p>Already has an account? <a href="login">login</a></p>
    </div>



</body>
</html>