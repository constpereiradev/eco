<h1>bem vindo, {{ Auth::user()->name}}</h1>


<form action="{{ route('profile')}}" method="GET">

    @csrf

    <button type="submit">Perfil</button>


</form>

