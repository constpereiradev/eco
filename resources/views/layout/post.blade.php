<div class="posts">
        
    @foreach (Auth::user()->posts as $post)

            <div class="user-post">
                <p>{{$post->post}}</p>
                <p>{{ $post->created_at}}</p>
            </div>
   
    @endforeach

</div>
