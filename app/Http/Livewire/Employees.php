<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; 

    public function render()
    {
        return view('livewire.employees', [
            'employees' => Employee::paginate(10)
        ]);
    }

}

