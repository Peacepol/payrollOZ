<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costcentre extends Model
{
    use HasFactory;
    public $table = 'costcentre';
    protected $fillable = [
        'cost_code',
        'cost_name',
    ];    
}
