<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Eco</title>

</head>
<body>
    <header class="header">
        <div class="nav">
            <ul>
                <li><button>ECO</button></li>
                <li><a href="home"><button>home</button></a></li>
                <li>
                    
                    <form action="{{ route('profile')}}" method="GET">

                        @csrf
                    
                        <button type="submit">profile</button>
                    
                    </form>
                
                </li>

                <li>
                    
                    <form action="{{ route ('logout')}}" method="post">
                        @csrf
                       
                        <button type="submit">logout</button>
                    </form>
                
                </li>
            </ul>
        </div>
    </header>
</body>
</html>