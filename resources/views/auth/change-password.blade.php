@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Change Password</h3>
                        <div class="card-body">
                            @if($errors->any())
                                {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                            @endif
                            @if(Session::get('error') && Session::get('error') != null)
                                <div style="color:red">{{ Session::get('error') }}</div>
                                @php
                                    Session::put('error', null)
                                @endphp
                            @endif
                            @if(Session::get('success') && Session::get('success') != null)
                                <div style="color:green">{{ Session::get('success') }}</div>
                                @php
                                    Session::put('success', null)
                                @endphp
                            @endif
                            <form class="form" action="{{ route('post.change.password') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                           name="current_password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                           name="new_password_confirmation">
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
