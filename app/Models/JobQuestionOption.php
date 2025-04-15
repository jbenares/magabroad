<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestionOption extends Model
{
    use HasFactory;
    protected $table = "jobquestion_option"; 
    protected $fillable = [
        'job_question_id',
        'option',
    ];
}
