<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function totalEmp()
    {
        $employeeCount = Employee::getTotalCount();
        return view('dashboard', compact('employeeCount'));
    }

    public function empList()
    {
        $employeeCount = Employee::getTotalCount();
        // $employees = Employee::paginate(10);
        
        return view('employeesList', [
            'employeeCount' => $employeeCount
        ]);
    }

}
 