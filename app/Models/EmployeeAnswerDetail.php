<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAnswerDetail extends Model
{
    use HasFactory;
    protected $table = "employee_answer_detail"; 
    protected $fillable = [
        'job_question_id',
        'job_question',
        'employee_answer'
    ];
}
