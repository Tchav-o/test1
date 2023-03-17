@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center"> {{ $posts['user']->name }}</h3>
                        <div class="card-body">
                            <div class="row m-3">
                                <a href="{{$posts['image']}}" target="_blank">{{$posts['image']}}</a>

                            </div>
                            <div class="row m-3">
                                <img src="{{$posts['image']}}" style="width:200px;" />
                            </div>
                            <div class="row m-3">
                                surname: {{ $posts['user']->surname }}
                            </div>
                            <div class="row m-3">
                                email: {{ $posts['user']->email }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="nav-link" href="{{ route('change.password') }}">change password</a>
                        </div>
                        <div class="card-footer">
                            <a class="nav-link" href="{{ route('crop-image-upload') }}">change profile image</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
