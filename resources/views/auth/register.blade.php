@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="border border-dark-subtle p-3 bg-body-tertiary rounded">
            <h1 class="text-center">Register</h1>
            <hr>
            <div class="d-flex justify-content-center">
                <div class="p-3">
                    <form action="/users/create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName">
                                Full Name
                            </label>
                            <input type="text" name="name" id="fullName" class="form-control" placeholder="Enter your full name here" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="emailAddress">
                                Email Address
                            </label>
                            <input type="text" name="email" id="emailAddress" class="form-control" placeholder="Enter your email address here" value="{{old('email')}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">
                                Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your secret password here">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirm">
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" id="passwordConfirm" class="form-control" placeholder="Enter the password again here to confirm">
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-success" type="button">Sign up</button>
                        </div>
                    </form>
                    <a href="/login" class="text-decoration-none">Already have an account?Log in here</a>
                </div>
            </div>
        </div>
    </div>
@endsection