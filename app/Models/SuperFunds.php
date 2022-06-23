<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperFunds extends Model
{
    use HasFactory;
    public $table = 'superfunds';
    protected $fillable = [
        'product_name',
        'registered_name',
        'physical_address_line_1',
        'physical_address_line_2',
        'physical_suburb',
        'physical_state',
        'physical_post_code',
        'postal_address_line_1',
        'postal_address_line_2',
        'postal_suburb',
        'postal_state',
        'postal_post_code',
        'contact_phone',
        'email',
        'abn',
        'bsb_account_number',
        'website_url',
    ];    
}
