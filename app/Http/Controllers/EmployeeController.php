<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();

        return Inertia::render('Employee/Index' , [
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
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' =>  'required|max:255',
            'gender' =>  'required',
            'birth_date' =>  'required|date|before:today',
            'marital_status' =>  'required',
            'employee_number' => 'required|unique:employees,employee_number',
        ]);

        Employee::create($request->all());

        return redirect()->to(route('employee.index'));

        // dd($request->all());
    }


    public function getEmployeeIds()
{
    $employeeIds = Employee::pluck('employee_number');
    return response()->json($employeeIds);
}

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
            'middle_name' => 'required|max:255',
            'last_name' =>  'required|max:255',
            'gender' =>  'required',
            'birth_date' =>  'required|date|before:today',
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
