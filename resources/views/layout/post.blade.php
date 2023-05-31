<div class="posts">

    @foreach (Auth::user()->posts as $post)

            <div class="user-post">
                <p>{{$post->post}}</p>
                <br>
                <p id="date">{{ $post->created_at->format('d/m/Y')}}</p>

                <form action="{{ route ('post.delete', ['user_id' => Auth::user()->id, 'post_id' => $post->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
   
    @endforeach

    @foreach ($posts as $post)

        @if ( Auth::user()->id != $post->user_id )

            <div class="user-post">
                
                @foreach ($users as $user)
                    
                    @if ($post->user_id == $user->id)
                        <p> @ {{ $user->name }}</p>
                    @endif
                @endforeach


                <br>
                <p>{{ $post->post }}</p>
                <br>
                <p id="date">{{ $post->created_at->format('d/m/Y') }}</p>
            </div>
                    
        @endif
    @endforeach
                
            

</div>
