<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_p_files', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->integer('emp_costid')->nullable();
            $table->integer('emp_paynoid')->nullable();
            $table->integer('emp_paylocid')->nullable();
            $table->integer('emp_defid')->nullable();
            $table->double('emp_rateyear')->nullable();
            $table->double('emp_rateunit')->nullable();
            $table->string('emp_paymode')->nullable();
            $table->string('emp_taxid')->nullable();
            $table->integer('emp_res')->nullable();
            $table->integer('emp_taxformlodged')->nullable();
            $table->integer('emp_dependents')->nullable();
            $table->integer('emp_supervisor')->nullable();
            $table->double('emp_contractsalary')->nullable();
            $table->double('emp_contractsalaryPGK')->nullable();
            $table->double('emp_initER')->nullable();
            $table->integer('emp_currency')->nullable();
            $table->date('emp_lastpaydate')->nullable();
            $table->string('emp_flag')->nullable();
            $table->date('emp_dot')->nullable();
            $table->date('emp_dor')->nullable();
            $table->string('emp_ncsl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_p_files');
    }
}
