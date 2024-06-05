@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="w-75 mx-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
      @if (session('message'))
      <x-flash-message>
        {{session('message');}}
      </x-flash-message>
      @endif
      <div class="d-flex align-items-center justify-content-between">
        <h1>Employees</h1>
        <div>
          @guest
          <a href="/login">Login</a> | <a href="/register">Register</a>
          @endguest
          @auth
          <div class="dropdown">
            <span role="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, <strong>{{Auth::user()->name;}}</strong>
            </span>
            <ul class="dropdown-menu">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
              </form>
            </ul>
          </div>
          @endauth
        </div>
      </div>
      @auth
      <a href="/employee/create" class="btn btn-success btn-sm"><i class="bi bi-plus"></i>Add New Employee</a>
      @endauth
        <hr>
        @unless (!$employees)
        <table class="table table-stripped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Job Position</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($employees as $index => $employee)
                <tr>
                  <th scope="row">{{$index + $employees->firstItem();}}</th>
                  <td>{{$employee->full_name ?? ''}}</td>
                  <td>{{$employee->email ?? ''}}</td>
                  <td>{{$employee->job_position ?? ''}}</td>
                  <td>{{$employee->phone_number ?? ''}}</td>
                  <td class="d-flex gap-2">
                    <a href="/employees/{{$employee->id}}" class="btn btn-secondary btn-sm" title="View employee">
                      <i class="bi bi-eye"></i>
                    </a>
                    @auth
                    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary btn-sm" title="Edit employee">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/employees/{{$employee->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" title="Delete employee"><i class="bi bi-trash3"></i></button>
                    </form>
                    @endauth
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$employees->links()}}
        @else
        <p>No employee records found!</p>
        @endunless
    </div>
</div>

@endsection