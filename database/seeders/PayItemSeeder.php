<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PayItem;

class PayItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayItem::create([
        'item_code' => 'MONI',
        'item_name' => 'Moni Plus Loan',
        'accum_id' => '15',
        'pay_mode' => 'F',
        'pay_fixamt' => '0',
        'pay_percent' => '10',
        'tax_flag' => 'BD',
        'tax_rate' => '0',
        'super_id' => '1',
        'tax_spread' => '1',
        'sequence' => '0',
        'gl_id' => '0',
        'bc_number' => '1',
        'bd_number' => '1',
        'isleaveaccrual' => '0',
    ]);
    PayItem::create([
        'item_code' => 'NSLXS',
        'item_name' => 'NSL Christmas Savings',
        'accum_id' => '18',
        'pay_mode' => 'F',
        'pay_fixamt' => '0',
        'pay_percent' => '0',
        'tax_flag' => 'ND',
        'tax_rate' => '0',
        'super_id' => '3',
        'tax_spread' => '1',
        'sequence' => '0',
        'gl_id' => '0',
        'bc_number' => '1',
        'bd_number' => '1',
        'isleaveaccrual' => '0',
    ]);
    PayItem::create([
        'item_code' => 'BTDED',
        'item_name' => 'Before Tax Deduction',
        'accum_id' => '15',
        'pay_mode' => 'F',
        'pay_fixamt' => '0',
        'pay_percent' => '0',
        'tax_flag' => 'DD',
        'tax_rate' => '0',
        'super_id' => '1',
        'tax_spread' => '1',
        'sequence' => '0',
        'gl_id' => '0',
        'bc_number' => '1',
        'bd_number' => '1',
        'isleaveaccrual' => '0',
    ]);
    }
}
