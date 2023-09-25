<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function serviceRecords()
{
    return $this->hasMany(ServiceRecord::class);
}

    protected $fillable= [
        'employee_number',
         'first_name',
         'last_name',
         'middle_name',
         'gender',
         'birth_date',
         'marital_status'
    ];

 
}

