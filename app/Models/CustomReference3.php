<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReference3 extends Model
{
    use HasFactory;
       protected $fillable = [
        'ref3_code',
        'ref3_name',
    ];
}
