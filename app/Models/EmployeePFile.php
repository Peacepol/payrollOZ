<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePFile extends Model
{
    use HasFactory;
 public $table = 'employee_p_files';
     protected $fillable = [
        'emp_id',
        'emp_costid',
        'emp_paynoid',
        'emp_paylocid',
        'emp_paynoid',
        'emp_defid',
        'emp_rateyear',
        'emp_rateunit',
        'emp_paymode',
        'emp_taxid',
        'emp_res',
        'emp_taxformlodged',
        'emp_dependents',
        'emp_supervisor',
        'emp_contractsalary',
        'emp_contractsalaryPGK',
        'emp_initER',
        'emp_currency',
        'emp_lastpaydate',
        'emp_flag',
        'emp_dot',
        'emp_dor',
        'emp_ncsl',
    ];
}
