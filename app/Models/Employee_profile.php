<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_profile extends Model
{
    use HasFactory;
    protected $table = "employee_profiles";

    protected $fillable = [
        "employee_id",
        "fullName",
    ];
}
