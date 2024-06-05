@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="w-75 mx-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <h1>Fill Employee Details</h1>
        <hr>
        <form action="/employee" method="POST">
            @csrf
            <div class="my-3">
                <label for="fullName">
                    Full Name
                </label>
                <input type="text" name="full_name" id="fullName" class="form-control w-50" placeholder="Enter the full name of the employee" value="{{old('full_name')}}">
                @error('full_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="my-3">
                <label for="emailId">
                    Email
                </label>
                <input type="mail" name="email" id="emailId" class="form-control w-50" placeholder="Enter the email address of the employee" value="{{old('email')}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="my-3">
                <label for="jobPosition">
                    Job position
                </label>
                <input type="text" name="job_position" id="jobPosition" class="form-control w-50" placeholder="Enter the job position of the employee" value="{{old('job_position')}}">
                @error('job_position')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="my-3">
                <label for="phoneNumber">
                    Phone number
                </label>
                <input type="tel" name="phone_number" id="phoneNumber" class="form-control w-50" placeholder="Enter the phone number of the employee" value="{{old('phone_number')}}">
                @error('phone_number')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-sm">Add Employee</button>
            <a href="/" class="btn btn-secondary btn-sm" data-confirm="">View All Employees</a>
        </form>
    </div>
</div>

@endsection