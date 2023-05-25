@include ('layout.header')

<h1>Profile</h1>

<form action="{{ route ('logout')}}" method="post">
 @csrf

 <button type="submit">Logout</button>
</form>

Name: {{Auth::user()->name}}
<br>
Posts: <br>
@foreach (Auth::user()->posts as $post)
    <ul>
        <li>
            {{$post->post}}
        </li>
    
    </ul>

@endforeach
