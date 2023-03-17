// ----------  FOR: Without image crop and resize -------------
@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <h3 class="card-header text-center">Upload Image</h3>
                        <div class="card-body">

                            <form class="form" enctype="multipart/form-data" id="upload-image" action="{{ route('save') }}" method="post">
                                @csrf


                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Profile image:</label>
                                    <input type="file" class="form-control"  name="image" placeholder="Choose image" id="image">
                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
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

