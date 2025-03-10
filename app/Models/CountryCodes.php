<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCodes extends Model
{
    use HasFactory;
    protected $table = "country_codes"; 
    protected $fillable = [
        'country_name',
        'country_code',
        'iso_code',
    ];
}
