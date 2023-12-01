<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     //poner los campos que se llenaran masivamente
     protected $fillable = ['name','email', 'phone', 'department_id'];
}
