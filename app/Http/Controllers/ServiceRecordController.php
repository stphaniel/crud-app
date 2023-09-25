<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ServiceRecord;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $service_records = ServiceRecord::join('employees', 'service_records.employee_id', '=', 'employees.id')
            ->select('employees.employee_number', 'service_records.*')
            ->get();

        return Inertia::render('ServiceRecord/Index', [
            'service_records' => $service_records,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $employees = Employee::all();
        return Inertia::render('ServiceRecord/Create', [
            'employees' => $employees,
        ]); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date_from' => 'required|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'position' => 'required|max:255',
            'salary' => 'required|numeric',
        ]);

        ServiceRecord::create($request->all());

        return redirect()->to(route('service_record.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    // public function edit($id)
    // {
    //     $service_record = ServiceRecord::join('employees', 'service_records.employee_id', '=', 'employees.id')
    //         ->select('employees.employee_number', 'service_records.*')
    //         ->where('service_records.id', $id)
    //         ->get();
    
    //     return Inertia::render('ServiceRecord/Edit', [
    //         'service_record' => $service_record
    //     ]);
    // }

    public function edit($id)
{
    $service_record = ServiceRecord::with('employee')->findOrFail($id);

    return Inertia::render('ServiceRecord/Edit', [
        'service_record' => $service_record,
        'employee_number' => $service_record->employee->employee_number, // Pass the employee_number
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceRecord $service_record)
    {

        $request->validate([
            // 'employee_id' => 'required|exists:employees,id',
            'date_from' => 'required|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'position' => 'required|max:255',
            'salary' => 'required|numeric',
        ]);


        
    //    dd($request);
       
    $service_record->update($request->all());
        // $service_records->update([
        //     'date_from' => $request->date_from,
        //     'date_to' => $request->date_to,
        //     'position' => $request->position,
        //     'salary' => $request->salary,
        // ]);
       return redirect()->to(route('service_record.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceRecord $service_record)
    {
        $service_record->delete();

        return redirect()->back();
    }
}
