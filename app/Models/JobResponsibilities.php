<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResponsibilities extends Model
{
    use HasFactory;
    protected $table = "job_responsibilities"; 
    protected $fillable = [
        'job_id',
        'responsibility',
        'employer_id',
    ];
}
