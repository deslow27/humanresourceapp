<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
    //
    public function index() {
        $leaveRequests = LeaveRequest::all();
        return view('leave-requests.index', compact('leaveRequests'));
    }

    public function create() {
        $employees = Employee::all();

        return view('leave-requests.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'employee_id' => 'required',
            'leave_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $request->merge([
            'status' => 'pending'
        ]);

        LeaveRequest::create($request->all());

        return redirect()->route('leave-requests.index')->with('success', 'Leave request created successfully.');
    }

}
