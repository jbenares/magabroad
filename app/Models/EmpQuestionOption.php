<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpQuestionOption extends Model
{
    use HasFactory;
    protected $table = "empquestion_option"; 
    protected $fillable = [
        'emp_question_id',
        'option',
    ];
}
