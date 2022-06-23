<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeestatus extends Model
{
    use HasFactory;
    public $table = 'empstatus';
    protected $fillable = [
        'status_code',
        'status_name',
    ];    
}
