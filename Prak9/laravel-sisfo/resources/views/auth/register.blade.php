@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Register</h1>
</div>


<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
        <div class="col-md-8">
            <input id="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name" 
                value="{{ old('name') }}" 
                required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        <div class="col-md-8">
            <input id="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" 
                value="{{ old('email') }}" 
                required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
        <div class="col-md-8">
            <input id="username" 
                type="text"
                class="form-control @error('username') is-invalid @enderror"
                name="username"
                value="{{ old('username') }}"
                required autocomplete="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        <div class="col-md-8">
            <input id="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password" 
                required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        <div class="col-md-8">
            <input id="password-confirm" 
                type="password" 
                class="form-control" 
                name="password_confirmation" 
                required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 offset-md-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
                
@endsection
