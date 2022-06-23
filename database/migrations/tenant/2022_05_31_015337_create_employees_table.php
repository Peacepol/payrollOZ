<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code')->unique();
            $table->string('emp_alphacode');
            $table->string('emp_isactive')->default(0);
            $table->string('emp_fname');
            $table->string('emp_mname');
            $table->string('emp_lname');
            $table->date('emp_dob');
            $table->string('emp_add1')->nullable();
            $table->string('emp_add2')->nullable();
            $table->string('emp_city')->nullable();
            $table->string('emp_state')->nullable();
            $table->string('emp_postcode')->nullable();
            $table->string('emp_country')->nullable();
            $table->string('emp_padd1')->nullable();
            $table->string('emp_padd2')->nullable();
            $table->string('emp_pcity')->nullable();
            $table->string('emp_pstate')->nullable();
            $table->string('emp_ppostcode')->nullable();
            $table->string('emp_pcountry')->nullable();
            $table->string('emp_phone',100)->nullable();
            $table->string('emp_mobile',100)->nullable();
            $table->string('emp_email',100);
            $table->date('emp_doe')->nullable();
            $table->integer('emp_branchid')->nullable();
            $table->integer('emp_depid')->nullable();
            $table->integer('emp_cref1id')->nullable();
            $table->integer('emp_cref2id')->nullable();
            $table->integer('emp_cref3id')->nullable();
            $table->string('emp_cfield1')->nullable();
            $table->string('emp_cfield2')->nullable();
            $table->string('emp_cfield3')->nullable();
            $table->string('emp_estatus',50)->nullable();
            $table->string('emp_position',50)->nullable();
            $table->string('emp_gender',50);
            $table->string('emp_mstatus',50);
            $table->date('emp_dot')->nullable();
            $table->string('emp_passportno',100)->nullable();
            $table->date('emp_passportexpiry')->nullable();
            $table->string('emp_visa',100)->nullable();
            $table->date('emp_visaexpiredate')->nullable();
            $table->string('emp_nationality');
            $table->string('emp_religion');
            $table->string('emp_comments')->nullable();
            $table->tinyInteger('emp_isapproved')->default(0);
            $table->tinyInteger('emp_accesslevel')->default(0);
            $table->binary('emp_img')->nullable();
            $table->integer('company_id');
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
        Schema::dropIfExists('employees');
    }
}
