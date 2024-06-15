<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    public $employeeId;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $address;
    public $gender;
    public $dob;
    public $joinDate;
    public $jobType;
    public $city;
    public $salary;
    public $age;

    public $employeeCount;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.employees', [
            'employees' => Employee::paginate(10)
        ]);
    }

    public function edit($id)
    {
        $employee                   = Employee::findOrFail($id);
        $this->employeeId           = $employee->id;
        $this->firstName            = $employee->first_name;
        $this->lastName             = $employee->last_name;
        $this->email                = $employee->email;
        $this->phone                = $employee->phone;
        $this->address              = $employee->address;
        $this->gender               = $employee->gender;
        $this->dob                  = $employee->dob;
        $this->joinDate             = $employee->join_date;
        $this->jobType              = $employee->job_type;
        $this->city                 = $employee->city;
        $this->salary               = $employee->salary;
        $this->age                  = $employee->age;
    }

    public function update()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            // Add validation for other fields as needed
        ]);

        if ($this->employeeId) {
            $employee = Employee::find($this->employeeId);
            $employee->update([
                'first_name'    => $this->firstName,
                'last_name'     => $this->lastName,
                'email'         => $this->email,
                'phone'         => $this->phone,
                'address'       => $this->address,
                'gender'        => $this->gender,
                'dob'           => $this->dob,
                'join_date'     => $this->joinDate,
                'job_type'      => $this->jobType,
                'city'          => $this->city,
                'salary'        => $this->salary,
                'age'           => $this->age,
            ]);

            $this->emit('employeeUpdated');
        } else {
            $this->emit('employeeError', 'Employee not found.');
        }

        // session()->flash('message', 'Employee updated successfully.');
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        // session()->flash('message', 'Employee deleted successfully.');
        $this->emit('employeeDeleted');
    }
}
