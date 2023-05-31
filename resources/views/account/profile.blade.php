@include ('layout.header')


<div class="profile">

    <h1 id="name">{{ Auth::user()->name }}</h1>

    <div class="bio">

        @if ( Auth::user()->bio ){

            <p> {{ Auth::user()->bio->bio }}</p>
            <button>Edit bio</button>
        }
            
        @else

                <input type="text" name="bio" id="bio-input">
                <button id="bio-button">Create Bio</button>


        @endif

    </div>

    
</div>

@include ('layout.createpost')

@include ('layout.post-profile')
@include ('layout.javascript')