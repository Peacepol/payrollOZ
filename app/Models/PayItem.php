<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayItem extends Model
{
    use HasFactory;
     protected $fillable = [
        'item_code',
        'item_name',
        'accum_id',
        'pay_mode',
        'pay_fixamt',
        'pay_percent',
        'tax_flag',
        'tax_rate',
        'super_id',
        'tax_spread',
        'sequence',
        'gl_id',
        'bc_number',
        'bd_number',
        'isleaveaccrual',
    ]; 
}
