<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empsuper extends Model
{
    use HasFactory;
    public $table = 'empsuper';
    protected $fillable = [
        'emp_id',
        'sup_id',
        'sup_no',
        'sup_commence',
        'sup_num',
    ];    
}
