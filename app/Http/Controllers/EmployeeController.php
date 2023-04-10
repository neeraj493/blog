<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\CompanyModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $employees = Employee::latest()->paginate(5);
        
            return view('employee.index',compact('employees'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comapny = CompanyModel::all();
        return view('employee.create',compact('comapny'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $request->validate([
                'company_id' => 'required',
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
      
            $input = $request->all();
            Employee::create($input);
         
            return redirect()->route('employee.index')
                            ->with('success','employee created successfully.');
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comapny = CompanyModel::all();
        $employee = Employee::where('id',$id)->first();
          
        return view('employee.edit', [
            'employee' => $employee,
            'comapny' => $comapny,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
              $request->validate([
                'company_id' => 'required',
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
      
  
        $input = $request->all();
          
        Employee::where('id',$id)->update([
            "company_id" => $request->company_id,
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]
    );
    
        return redirect()->route('employee.index')
                        ->with('success','employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
