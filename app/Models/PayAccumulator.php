<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payaccumulator extends Model
{
    use HasFactory;
    public $table = 'payaccumulator';
    protected $fillable = [
        'payaccumulator_code',
        'payaccumulator_name',
    ];    
}
