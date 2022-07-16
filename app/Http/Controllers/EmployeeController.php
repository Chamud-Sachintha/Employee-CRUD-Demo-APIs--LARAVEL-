<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployees(){
        return response()->json(Employee::all(), 200);
    }

    public function getEmployeeById($employee_id){
        $employee = Employee::find($employee_id);

        if(is_null($employee)){
            return response()->json(['message'=>'Not Found'], 404);
        }else{
            return response()->json($employee, 200);
        }
    }

    public function saveEmployee(Request $request_data){
        $employee = Employee::create($request_data->all());

        return response()->json($employee, 201);
    }

    public function updateEmployeeById($employee_id,Request $requested_data){
        $employee = Employee::find($employee_id);

        if(is_null($employee)){
            return response()->json(['message'=>'not found employee'], 404);
        }else{
            $employee->update($requested_data->all());

            return response()->json($employee, 200);
        }
    }

    public function deleteEmployeeById($id){
        $employee = Employee::find($id);

        if(is_null($employee)){
            return response()->json(['message'=>'not found employee'], 404);
        }else{
            $employee->delete();

            return response()->json(['message'=>'Delete Success'], 200);
        }
    }
}
