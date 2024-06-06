@extends('layouts.main')

@section('content')
<div class="border border-dark-subtle p-3 bg-body-tertiary rounded w-50">
    <h1 class="text-center">Login</h1>
    <hr>
    @if (session('message'))
    <x-flash-message>
        {{session('message')}}
    </x-flash-message>
    @endif
        <form action="/users/authenticate" method="post" class="">
            @csrf
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
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-success" type="button">Sign in</button>
            </div>
        </form>
        <a href="/register" class="text-decoration-none">Don't have an account?Register here</a>
@endsection