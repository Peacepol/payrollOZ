<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpcontactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empcontact', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('emp_cname');
            $table->string('emp_cadd');
            $table->string('emp_cphone');
            $table->string('emp_cmobile');
            $table->string('emp_cemail');
            $table->string('emp_crelation');
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
        Schema::dropIfExists('empcontact');
    }
}
