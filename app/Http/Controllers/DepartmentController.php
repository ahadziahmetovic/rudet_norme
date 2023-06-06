<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::get();

        return view('newDepartment',['departments'=> $departments]);
    }

    public function create(Request $request)
    {
        Department::create($request->all());
        return Redirect::back();
    }

    public function destroy($department)
    {
        //Remove record

        $department = Department::find($department);
        $department->delete();
        return Redirect::route('newDepartment');
    }
}
