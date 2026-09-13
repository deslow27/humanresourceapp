<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;

class EmployeeController extends Controller
{
    //
    public function index(){
        $employees = Employee::all();
        return view("employees.index",compact("employees"));
    }

    public function create(){
        $departments = Department::all();
        $roles = Role::all();
        return view("employees.create", compact("departments","roles"));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'email|required',
            'phone_number' => 'string|required|max:15',
            'address' => 'nullable|required',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'string|required',
            'salary' => 'numeric|required'
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success','Employee created successfully');
    }
}
