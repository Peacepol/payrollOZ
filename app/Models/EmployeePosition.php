<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    use HasFactory;
    public $table = 'empposition';
    protected $fillable = [
        'position_code',
        'position_name',
    ];    
}
