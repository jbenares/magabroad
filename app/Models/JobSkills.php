<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkills extends Model
{
    use HasFactory;
    protected $table = "job_skills"; 
    protected $fillable = [
        'job_id',
        'skill',
        'employer_id',
    ];
}
