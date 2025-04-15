<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpQuestion extends Model
{
    use HasFactory;
    protected $table = "emp_question"; 
    protected $fillable = [
        'question',
        'question_type',
    ];
}
