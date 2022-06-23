<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReference2 extends Model
{
    use HasFactory;
       protected $fillable = [
        'ref2_code',
        'ref2_name',
    ];
}
