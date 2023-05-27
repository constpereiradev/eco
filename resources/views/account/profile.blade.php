@include ('layout.header')



<div class="profile">

    <h1 id="name">{{ Auth::user()->name }}</h1>

    <div class="bio">

        <p> {{ Auth::user()->bio->bio }} </p>

        <button>Edit bio</button>
    </div>

    
</div>

@include ('layout.createpost')

@include ('layout.post')
