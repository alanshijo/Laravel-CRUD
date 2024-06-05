@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="w-75 mx-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <h1>Employee Details - {{$employee->full_name ?? ''}}</h1>
        <hr>
            <div class="my-3">
                <label for="fullName">
                    Full Name
                </label>
                <input type="text" name="full_name" id="fullName" class="form-control w-50" placeholder="Enter the full name of the employee" value="{{old('full_name') ?? $employee->full_name}}" readonly>
            </div>
            <div class="my-3">
                <label for="emailId">
                    Email
                </label>
                <input type="mail" name="email" id="emailId" class="form-control w-50" placeholder="Enter the email address of the employee" value="{{old('email') ?? $employee->email}}" readonly>
            </div>
            <div class="my-3">
                <label for="jobPosition">
                    Job position
                </label>
                <input type="text" name="job_position" id="jobPosition" class="form-control w-50" placeholder="Enter the job position of the employee" value="{{old('job_position') ?? $employee->job_position}}" readonly>
            </div>
            <div class="my-3">
                <label for="phoneNumber">
                    Phone number
                </label>
                <input type="tel" name="phone_number" id="phoneNumber" class="form-control w-50" placeholder="Enter the phone number of the employee" value="{{old('phone_number') ?? $employee->phone_number}}" readonly>
            </div>
            <a href="/" class="btn btn-secondary btn-sm" data-confirm="">View All Employees</a>
    </div>
</div>

@endsection