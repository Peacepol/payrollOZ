<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
      public function run()
    {
          $this->call([PayItemSeeder::class]);
         DB::table('accum')->insert(
         ['accum_code' => 'NO', 'acccum_name' => 'Normal Pay/Ordinary Pay'],
         ['accum_code' => 'O1', 'acccum_name' => 'Overtime 1'],
         ['accum_code' => 'O2', 'acccum_name' => 'Overtime 2'],
         ['accum_code' => 'S1', 'acccum_name' => 'Special Rate 1'],
         ['accum_code' => 'S2', 'acccum_name' => 'Special Rate 2'],
         ['accum_code' => 'TA', 'acccum_name' => 'Taxable Benefits & Allowance'],
         ['accum_code' => 'NA', 'acccum_name' => 'Non Taxable Benefits & Allowance'],
         ['accum_code' => 'SE', 'acccum_name' => 'Superannuation Employee'],
         ['accum_code' => 'SR', 'acccum_name' => 'Superannuation Employer'],
         ['accum_code' => 'MV', 'acccum_name' => 'Motor Vehicle Notional Allowances'],
         ['accum_code' => 'AC', 'acccum_name' => 'Accommodation Notional Allowances'],
         ['accum_code' => 'NCSL', 'acccum_name' => 'NCSL Contributions'],
         ['accum_code' => 'LS', 'acccum_name' => 'Lump Sum Payments'],
         ['accum_code' => 'SAV', 'acccum_name' => 'Savings'],
         ['accum_code' => 'MISC', 'acccum_name' => 'Miscellaneous Deductions'],
         ['accum_code' => 'TAXADJ', 'acccum_name' => 'Tax Adjustments'],
         ['accum_code' => 'ATI', 'acccum_name' => 'Taxable Income Adjustments'],
         ['accum_code' => 'MEALS', 'acccum_name' => 'Meals Notional Allowances'],);
        
        }
   
}
