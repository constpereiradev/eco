<div class="createpost">

    <form action="{{route ('post.create', ['id' => Auth::user()->id])}}" method="post">

        @csrf
        <input type="text" name="post">
        <button type="submit">Create</button>

    </form>

</div>