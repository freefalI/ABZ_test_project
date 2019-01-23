<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class EmployeesTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = new Collection();
        $root = Employee::find(1);
        $employees->push($root);
        $employees=$employees->merge($root->children);
     
        return view('employees.index', compact( 'employees'));
    }

    public function children($employee_id)
    {
        $employee = Employee::with('position')->find($employee_id);

        return json_encode($employee->childrenWithPositions);
    }

    public function table(Request $request)
    {   
        if($request['search_field'] || $request['search_text']){

            $validator = $request->validate([
                'search_field' => 'required',
                'search_text' => 'required',
            ]);

            $tableName= request('sort')=='boss.name'? 'parent_employees' : 'employees';
            $employees = Employee::with('position','boss')->where("$tableName.".$request['search_field'],'like','%'.$request['search_text'].'%')->sortable()->paginate(20);// ('position','boss')->sortable()->paginate(20);
        }
        else{
            $employees = Employee::with('position','boss')->sortable()->paginate(20);
        }
        
        return view('employees.table',compact('employees'));

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
