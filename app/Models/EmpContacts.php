<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpContacts extends Model
{
    use HasFactory;
    public $table = 'empcontact';
    protected $fillable = [
        'emp_id',
        'emp_cname',
        'emp_cadd',
        'emp_cphone',
        'emp_cmobile',  
        'emp_cemail',
        'emp_crelation',
    ];    
}
