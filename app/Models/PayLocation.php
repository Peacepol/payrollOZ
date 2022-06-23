<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayLocation extends Model
{
    use HasFactory;
    public $table = 'paylocation';
    protected $fillable = [
        'paylocation_code',
        'paylocation_name	',
        'company_id',
    ];    
}
