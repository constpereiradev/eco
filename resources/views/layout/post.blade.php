
@foreach (Auth::user()->posts as $post)

    <div class="post">
        <div class="text">
            <p>{{$post->post}}</p>
            <p>{{ $post->created_at}}</p>
        </div>
        
    </div>
   
@endforeach