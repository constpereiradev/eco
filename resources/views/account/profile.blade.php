@include ('layout.header')
<title>Profile</title>


<div class="profile">

    <h1 id="name">{{ Auth::user()->name }}</h1>

    <div class="bio">

        @if ( Auth::user()->bio ){

            <p> {{ Auth::user()->bio->bio }}</p>
            <button>Edit bio</button>
        }
            
        @else
            <button>Create bio</button>
        @endif

    </div>

    
</div>

@include ('layout.createpost')

@include ('layout.post')
