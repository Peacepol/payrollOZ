<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'item_id',
        'loan_amt',
        'loan_dedamt',
        'loan_bal',
        'loan_advdate',
        'loan_dedstart',
        'loan_flag',
    ];  
}
