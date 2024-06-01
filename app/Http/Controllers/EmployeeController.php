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


    public function empList() {

        return view('employeesList');
        
    }
}
 