<h1>Profile</h1>

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
