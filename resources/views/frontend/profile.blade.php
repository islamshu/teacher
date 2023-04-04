@extends('layouts.index')

@section('content')
<div class="container " style="margin-top: 10%;margin-bottom: 10%">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="{{ asset('uploads/'.$user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle mb-2" style="max-width: 100px;">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    @include('dashboard.parts._error')
                    @include('dashboard.parts._success')

                    <form method="POST" action="{{ route('company_update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="avatar" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                            </div>
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
