<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    use HasFactory;
    protected $table = "applicant_statuses"; 
    protected $fillable = [
        'name',
        'description'
    ];
}
