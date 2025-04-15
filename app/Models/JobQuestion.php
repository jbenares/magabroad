<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    use HasFactory;
    protected $table = "job_question"; 
    protected $fillable = [
        'employer_id',
        'job_id',
        'question',
        'question_type',
    ];
}
