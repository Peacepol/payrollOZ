<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    use HasFactory;
     protected $fillable = [
        'payref',
        'loan_id',
        'emp_id',
        'item_id',
        'amt',
        'pmt_date',
        'comments',
    ]; 
}
