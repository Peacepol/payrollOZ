<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayBatch extends Model
{
    use HasFactory;
    public $table = 'paybatchnumber';
    protected $fillable = [
        'paybatch_code',
        'paybatch_name	',
        'company_id',
    ];    
}
