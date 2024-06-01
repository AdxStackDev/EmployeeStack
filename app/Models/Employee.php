<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'phone',
        'address',
        'gender',
        'dob',
        'join_date',
        'join_type',
        'salary',
        'age',
    ];



    public static function getTotalCount()
    {
        return self::count();
    }

}

