<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
     protected $fillable = [
        'branch_code',
        'branch_name',
        'company_id',
        'branch_address',
    ];

}
