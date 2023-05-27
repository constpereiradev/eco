<div class="createpost">

    <form action="{{route ('post.create', ['id' => Auth::user()->id])}}" method="post">

        @csrf
        <div class="post">
            <textarea autofocus required spellcheck="false" wrap="hard" maxlength="100" minlength="1" placeholder="Tell us how you feeling today..." name="post" id="" cols="30" rows="10"></textarea>
            <button type="submit">Create</button>
        </div>

    </form>

</div>