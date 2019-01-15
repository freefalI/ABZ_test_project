<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $positions = Position::withDepth()->get();
        // $data = Employee::countErrors();
        // dd($data);
        // $employees=Employee::all();


        $employees = new Collection();
        $root = Employee::find(1);
        $employees->push($root);
        $employees=$employees->merge($root->children);
        // dd($employees);


        // $employees = Employee::defaultOrder()->get();//all();
        // $employees = Employee:: get()->toTree();
       
        return view('employees.index', compact( 'employees'));
    }

    public function children($employee_id)
    {
        // $employee = Employee::find($employee_id);
        $employee = Employee::with('position')->find($employee_id);

        return json_encode($employee->childrenWithPositions);
    }


    public function index2()
    {
        $positions = Position::withDepth()->get();
        // $employees = Employee::all();
        return view('employees.index2', compact( 'positions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
