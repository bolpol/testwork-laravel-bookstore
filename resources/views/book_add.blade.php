@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book Add') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/book/add_post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    {{ __('Author name: ') }}</label>

                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                                           name="author" value="{{ old('author') }}" required autofocus>

                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    {{ __('Book title: ') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    {{ __('Book pages: ') }}</label>

                                <div class="col-md-6">
                                    <input id="pages" type="number" class="form-control{{ $errors->has('pages') ? ' is-invalid' : '' }}"
                                           name="pages" required autofocus>

                                    @if ($errors->has('pages'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pages') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    {{ __('Describe: ') }}</label>

                                <div class="col-md-6">
                                    <input id="describe" type="text" class="form-control{{ $errors->has('describe') ? ' is-invalid' : '' }}"
                                           name="describe" value="{{ old('describe') }}" required autofocus>

                                    @if ($errors->has('describe'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('describe') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label text-md-right">Input cover image: </label>
                                <div class="col-md-6">
                                    <input id="image" type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
                                </div>
                            </div>

                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button id="button_add" type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
/*        document.addEventListener('DOMContentLoaded', function(){
            document.querySelector("#button_add").addEventListener("click", function () {
                var http = new XMLHttpRequest();
                var url = window.location.href + '_post';
                var params = 'orem=ipsum&name=binny';
                http.open('POST', url, true);

                //Send the proper header information along with the request
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                http.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

                http.onreadystatechange = function() {//Call a function when the state changes.
                    if(http.readyState == 4 && http.status == 200) {
                        console.log(http.responseText);
                    }
                }
                http.send(params);
            })
        })*/
    </script>

@endsection
