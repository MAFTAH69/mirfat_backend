@extends('layouts.app')
@section('sidebar')
    <div class="col-md-2">
        @include('components.left_nav')
    </div>
@endsection

@section('content')
    <div class="col-md-10 py-3">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('errors'))
                <div class="alert alert-success" role="alert">
                    {{ session('errors') }}
                </div>
            @endif

            <!-- ACTIONS -->
            <section id="actions" class="py-2 mb-4 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#addStreamModal">
                                <i class="fas fa-plus"></i> Add Stream
                            </a>

                        </div>
                    </div>
                </div>
            </section>

            <section id="streams">
                <div class="container">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>STREAMS</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Mzungumzaji</th>
                                    <th>Mada</th>
                                    <th>Url</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($streams as $index => $stream)

                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $stream->speaker }}</td>
                                        <td>{{ $stream->topic }}</td>
                                        <td>{{ $stream->url }}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#playStreamModal-{{$stream->id}}"><i class="fas fa-play">
                                                Play</i></a>
                                            <!-- EDIT STREAM MODAL -->
                <div class="modal fade" id="playStreamModal-{{$stream->id}}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Live Stream</h5>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                       <div class="">
                                            <audio src="{{$stream->url}}" controls style="width: 100%"></audio>
                                       </div>
                            </div>
                        </div>
                    </div>
                </div>
                                         </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#editStreamModal-{{$stream->id}}" >
                                                <i class="fas fa-edit">
                                                    Edit</i>
                                            </a>

             <!-- EDIT STREAM MODAL -->
            <div class="modal fade" id="editStreamModal-{{$stream->id}}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Edit Stream</h5>
                            <button class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="PUT" action="{{ route('edit_stream',$stream->id) }}" >
                                @csrf

                                <div class="form-group row">
                                    <label for="speaker"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Speaker') }}</label>
                                    <div class="col-md-6">
                                        <input id="speaker" type="text"
                                            class="form-control @error('speaker') is-invalid @enderror" name="speaker"
                                            value="{{ old('speaker',$stream->speaker) }}" required autocomplete="speaker" autofocus>
                                        @error('speaker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="topic"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Topic') }}</label>
                                    <div class="col-md-6">
                                        <input id="topic" type="text"
                                            class="form-control @error('year') is-invalid @enderror" name="topic"
                                            value="{{ old('topic',$stream->topic) }}" required autocomplete="topic" >
                                        @error('topic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="url"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>
                                    <div class="col-md-6">
                                        <input id="url" type="text"
                                            class="form-control @error('year') is-invalid @enderror" name="url"
                                            value="{{ old('url',$stream->url) }}" required autocomplete="url" >
                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete_stream', $stream->id) }}"
                                                onclick="return confirm('This stream will be deleted')"
                                                class="btn btn-outline-danger">
                                                <i class="fas fa-trash"> Delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </section>


            <!-- ADD STREAM MODAL -->
            <div class="modal fade" id="addStreamModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Add Stream</h5>
                            <button class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('add_stream') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="speaker"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Speaker') }}</label>
                                    <div class="col-md-6">
                                        <input id="speaker" type="text"
                                            class="form-control @error('speaker') is-invalid @enderror" name="speaker"
                                            value="{{ old('speaker') }}" required autocomplete="speaker" autofocus>
                                        @error('speaker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="topic"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Topic') }}</label>
                                    <div class="col-md-6">
                                        <input id="topic" type="text"
                                            class="form-control @error('year') is-invalid @enderror" name="topic"
                                            value="{{ old('topic') }}" required autocomplete="topic" >
                                        @error('topic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="url"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>
                                    <div class="col-md-6">
                                        <input id="url" type="text"
                                            class="form-control @error('year') is-invalid @enderror" name="url"
                                            value="{{ old('url') }}" required autocomplete="url" >
                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                        </script>
        </div>
    </div>
@endsection
