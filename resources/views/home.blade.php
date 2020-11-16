@extends('layouts.app')
@section('sidebar')
    <div class="col-md-2">
        @include('components.left_nav')
    </div>
@endsection

@section('content')
    <div class="col-md-10">
        <div class="container">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class=" card welcome my-3 shadow-lg" style="color:rgb(141, 63, 12); text-align: center; padding-top:40px;background-color:rgb(238, 232, 217)">
                <h1><b> WELCOME TO ADMINISTRATOR DASHBOARD</b></h1>
            </div><br><br>
            <div style="text-align: center">Summary</div>
            <hr width="60%">
            <div class=" row card-body" style="">
                <a href="{{route('pictures')}}" class="nav-link">
                    <div class="col-4" style="padding: 5px;">
                        <button class="card btn btn-outline-warning"
                            style="width: 320px; height:250px;margin:auto; background-color:rgb(110, 129, 120)">
                            <h2 style="margin:auto; text-align:center"><span><i class="fas fa-image"></i></span><br> PICTURES<br>
                                ( {{count($pictures)}} )
                            </h2>
                        </button>
                    </div>
                </a>
                <a href="{{route('videos')}}" class="nav-link">
                    <div class="col-4" style="padding: 5px;">
                        <button class="card btn btn-outline-success"
                            style="width: 320px; height:250px;margin:auto; background-color:rgb(247, 218, 180)">
                            <h2 style="margin:auto; text-align:center"><span><i class="fas fa-video"></i></span><br> VIDEOS<br>
                                ( {{count($videos)}} )
                            </h2>
                        </button>
                    </div>
                </a>
                <a href="{{route('live_stream')}}" class="nav-link">
                    <div class="col-4" style="padding: 5px;">
                        <button class="card btn btn-outline-danger"
                            style="width: 320px; height:250px;margin:auto; background-color:rgb(180, 198, 247)">
                            <h2 style="margin:auto; text-align:center"><span><i class="fas fa-link"></i></span><br> LIVE LINKS<br>
                                ( {{count($streams)}} )
                            </h2>
                        </button>
                    </div>
                </a>

            </div>

            <!--FOOTER  -->
            <footer id="main-footer" class="bg-light text-dark mb-3">
                <div class="container">
                    <div class="col">
                        <hr>
                        <p class="lead text-center">
                            Copyright &copy; <span id="year"></span> Safhatussaalihiin
                        </p>
                    </div>
                </div>
            </footer>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
                integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
                crossorigin="anonymous" />

            <script>
                // Get the current year for the copyright
                $('#year').text(new Date().getFullYear());

                CKEDITOR.replace('editor1');

            </script>
        </div>
    </div>
@endsection
