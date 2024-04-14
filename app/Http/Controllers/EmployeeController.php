<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employee_detail;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        // $employees = Employee::with('employee_detail')->simplePaginate(3);
        // $employees = Employee::with('employee_detail')->where('isDelete', false)->simplePaginate(3);
        // return view('employees.index', compact('employees'));

        $query = Employee::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        $employees = $query->with('employee_detail')->where('isDelete', false)->simplePaginate(3);
    
        return view('employees.index', compact('employees'));
    }
    

    public function create()
    {
        return view('employees.create');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $employee_detail = Employee_detail::where('employee_id', $id)->first();
        return view('employees.edit', compact('employee','employee_detail'));
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.delete', compact('employee'));
    }
    

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee_detail = Employee_detail::where('employee_id', $id)->first();

        $employee->where('id', $id)->update([
            'isDelete' => true,
        ]);

        $employee_detail->where('employee_id', $id)->update([
            'isDelete' => true,
        ]);
    
        return redirect('/employees')->with('success', 'Employee deleted successfully');
    }
    
    
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'status' => 'required',
            'isDelete' => 'sometimes|boolean',
            'join_date' => 'required|date',
        ]);
        $validatedData['isDelete'] = false;

        $validateDetail = $request->validate([
            'employee_id' => 'sometimes|integer',
            'experience' => 'required|integer',
            'job_title' => 'required',
            'job_description' => 'required',
            'isDelete' => 'sometimes|boolean',
        ]);
        $validateDetail['isDelete'] = false;
        
        $employee = Employee::create($validatedData);
        
        $validateDetail['employee_id'] = $employee->id;
        $detailData = [
            'experience' => $validateDetail['experience'],
            'job_title' => $validateDetail['job_title'],
            'job_desc' => $validateDetail['job_description'],
            'isDelete' => $validateDetail['isDelete'],
        ];

        if (array_key_exists('employee_id', $validateDetail)) {
            $detailData['employee_id'] = $validateDetail['employee_id'];
        }
        Employee_detail::create($detailData);

        return redirect('/employees')->with('success', 'add employee berhasil');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'status' => 'required',
            'join_date' => 'required|date',
            'experience' => 'required|integer',
            'job_title' => 'required',
            'job_description' => 'required',
        ]);
        
        $employee = Employee::findOrFail($id);
        $employee_detail = Employee_detail::where('employee_id', $id)->first();

        $employee->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'dob' => $validatedData['dob'],
            'status' => $validatedData['status'],
            'join_date' => $validatedData['join_date'],
            'isDelete' => false,
        ]);
        
        $employee_detail->update([
            'experience' => $validatedData['experience'],
            'job_title' => $validatedData['job_title'],
            'job_desc' => $validatedData['job_description'],
            'isDelete' => false,
        ]);
    
    
        // return view('employees.index');
        return redirect('/employees')->with('success', 'Employee updated successfully');
    }
    

}
