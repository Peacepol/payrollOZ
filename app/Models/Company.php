<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

     public $table = "company";
     protected $fillable = [
        'comp_name',
        'comp_trading',
        'comp_add1',
        'comp_add2',
        'comp_city',
        'comp_state',
        'comp_postcode',
        'comp_country',
        'comp_madd1',
        'comp_madd2',
        'comp_mcity',
        'comp_mstate',
        'comp_mpostcode',
        'comp_mcountry',
        'comp_phone1',
        'comp_phone2',
        'comp_fax1',
        'comp_fax2',
        'comp_email',
        'comp_contact',
        'comp_taxno',
        'comp_businessno',
        'comp_superfund',
        'comp_superfundno',
        'comp_ncslno',
        'comp_initpy',
        'comp_setupflag',
        'comp_curpy',
        'comp_empmax',
        'comp_isactive',

    ];
}
