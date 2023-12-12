<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;
    protected $table = "employee_profiles";

    protected $fillable = [
        "employee_id",
        "fullName",
    ];
}
