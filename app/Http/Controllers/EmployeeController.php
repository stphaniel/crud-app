<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ServiceRecord;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();

        return Inertia::render('Employee/Index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return Inertia::render('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required|unique:employees',
            'first_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required',
            'marital_status' => 'required',
            'position' => 'required|max:255',
            'salary' => 'required|numeric',
            'date_from' => 'required|date|before_or_equal:today',
            'date_to' => 'nullable|date|after_or_equal:date_from',

            
        ]);

        // New employee
        $employee = Employee::create([
            'employee_number' => $request->employee_number,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
        ]);

        // New service record for the employee
        ServiceRecord::create([
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'position' => $request->position,
            'salary' => $request->salary,
            'employee_id' => $employee->id,
            'employee_number' => $employee->employee_number,
        ]);

        return redirect()->route('employee.index');
    }
    //     public function getEmployeeIds()
    // {
    //     $employeeIds = Employee::pluck('employee_number');
    //     return response()->json($employeeIds);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return Inertia::render('Employee/Edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'last_name' =>  'required|max:255',
            'gender' =>  'required',
            'birth_date' =>  'date|before:today',
            'marital_status' =>  'required',
        ]);




        $employee->update($request->all());

        return redirect()->to(route('employee.index'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back();
    }
}
