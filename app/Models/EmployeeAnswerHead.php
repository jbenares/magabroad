<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAnswerHead extends Model
{
    use HasFactory;
    protected $table = "employee_answer_head"; 
    protected $fillable = [
        'employer_id',
        'job_id',
        'employee_id'
    ];
}
