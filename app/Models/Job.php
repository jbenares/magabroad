<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "job"; 
    protected $fillable = [
        'job_title',
        'job_description',
        'job_summary',
        'industry',
        'employement_category',
        'workplace',
        'city',
        'region',
        'country',
        'job_type',
        'pay_type',
        'currency',
        'salary_from',
        'salary_to',
        'confidential',
        'start_date',
        'end_date',
        'employer_id',
    ];
}
