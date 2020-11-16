

{{-- NAVIGATION PANE --}}

<div style="background: #d8cca6 !important; min-height: 80vh;  padding-top:10px ">

    <!-- HEADER -->

    <header id="main-header" class="py-2 text-dark">
        <div class="container">
            <div class="row">
                <h2 style="padding-left: 20px">
                    <i class="fas fa-cog"> Dashboard</i>
                </h2>
            </div>
        </div>
        <style>

        </style>
    </header>
    <hr>
    <div style="padding: 1em; color:rgb(6, 5, 36); ">
        <h5 style="font-size: 23px; padding-left:5px" class="nav-item-heading">Menu</h5>
        <li class="nav-item active list-unstyled">
            <a class="nav-link left-menu-link" href="{{route('today')}}">

                <h5><i class="fas fa-calendar"></i>Today's Posts</h5>
            </a>
        </li>
        <li class="nav-item active list-unstyled">
            <a class="nav-link left-menu-link" href="{{route('pictures')}}">

                <h5><i class="fas fa-image"></i>Pictures</h5>
            </a>
        </li>
        <li class="nav-item active list-unstyled">
            <a class="nav-link left-menu-link" href="{{route('videos')}}">

                <h5><i class="fas fa-video"></i>Videos</h5>
            </a>
        </li>

        <li class="nav-item active list-unstyled">
            <a class="nav-link left-menu-link" href="{{route('live_stream')}}">

                <h5><i class="fas fa-broadcast-tower"></i>Live Stream</h5>
            </a>
        </li>

        <hr>
        <h5 style="font-size: 23px; padding-left:5px" class="nav-item-heading">User Preferences </h5>
        <li class="nav-item  list-unstyled">
            <a class="nav-link left-menu-link">
                <h5> <i class="fas fa-key" aria-hidden="true"></i>

                   Logout</h5>
            </a>
        </li>
    </div>
</div>
