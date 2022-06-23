<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReference1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref1_code',
        'ref1_name',
    ];
}
