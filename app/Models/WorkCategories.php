<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCategories extends Model
{
    use HasFactory;
    protected $table = "work_categories"; 
    protected $fillable = [
        'name',
    ];
}
