<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function create(){
        return view('employee.create');
    }
    
    public function store(Request $request){
        $request->validate([
           'full_name' => 'required',
           'email' => 'required|email|unique:employees,email',
           'job_position' => 'required',
           'phone_number' => 'required|min:10|max:10|unique:employees,phone_number'
        ]);

        Employee::create($request->all());

        return Redirect::route('employee.listing')->with('message', 'Employee Created Successfully');
    }

    public function index(){
        $employees = Employee::latest()->paginate(10);
        return view('employee.index', compact('employees'));
    }

    public function view(Employee $employee){
        return view('employee.view', compact('employee'));
    }

    public function edit(Employee $employee){
        return view('employee.update', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee){
        $request->validate([
            'full_name' => 'required',
           'email' => ['required', 'email', Rule::unique('employees')->ignore($employee->id)],
           'job_position' => 'required',
           'phone_number' => ['required', 'min:10', 'max:10', Rule::unique('employees')->ignore($employee->id)]
        ]);
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->job_position = $request->job_position;
        $employee->phone_number = $request->phone_number;
        $employee->save();
        return Redirect::route('employee.listing')->with('message', 'Employee Updated Successfully');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return Redirect::route('employee.listing')->with('message', 'Employee Deleted Successfully');
    }

}
