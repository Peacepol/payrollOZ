<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_code',
        'emp_alphacode',
        'emp_isactive',
        'emp_fname',
        'emp_mname',
        'emp_lname',
        'emp_dob',
        'emp_add2',
        'emp_city',
        'emp_state',
        'emp_postcode',
        'emp_country',
        'emp_padd1',
        'emp_padd2',
        'emp_pcity',
        'emp_pstate',
        'emp_ppostcode',
        'emp_pcountry',
        'emp_phone',
        'emp_mobile',
        'emp_email',
        'emp_doe',
        'emp_branchid',
        'emp_depid',
        'emp_cref1id',
        'emp_cref2id',
        'emp_cref3id',
        'emp_cfield1',
        'emp_cfield2',
        'emp_cfield3',
        'emp_estatus',
        'emp_position',
        'emp_gender',
        'emp_mstatus',
        'emp_dot',
        'emp_passportno',
        'emp_passportexpiry',
        'emp_visa',
        'emp_visaexpiredate',
        'emp_nationality',
        'emp_religion',
        'emp_comments',
        'emp_isapproved',
        'emp_accesslevel',
        'emp_img',
        'company_id',
    ];
}
