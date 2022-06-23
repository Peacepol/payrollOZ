<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('comp_name');
            $table->string('comp_trading')->nullable();
            $table->text('comp_add1')->nullable();
            $table->text('comp_add2')->nullable();
            $table->string('comp_city')->nullable();
            $table->string('comp_state')->nullable();
            $table->string('comp_postcode')->nullable();
            $table->string('comp_country')->nullable();
            $table->text('comp_madd1')->nullable();
            $table->text('comp_madd2')->nullable();
            $table->string('comp_mcity')->nullable();
            $table->string('comp_mstate')->nullable();
            $table->string('comp_mpostcode')->nullable();
            $table->string('comp_mcountry')->nullable();
            $table->string('comp_phone1')->nullable();
            $table->string('comp_phone2')->nullable();
            $table->string('comp_fax1')->nullable();
            $table->string('comp_fax2')->nullable();
            $table->string('comp_email')->nullable();
            $table->string('comp_contact')->nullable();
            $table->string('comp_taxno')->nullable();
            $table->string('comp_businessno')->nullable();
            $table->string('comp_superfund')->nullable();
            $table->string('comp_superfundno')->nullable();
            $table->string('comp_ncslno')->nullable();
            $table->bigInteger('comp_initpy')->nullable();
            $table->tinyInteger('comp_setupflag')->default('0');
            $table->bigInteger('comp_curpy')->nullable();
            $table->bigInteger('comp_empmax')->nullable();
            $table->tinyInteger('comp_isactive')->default('0');
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
        Schema::dropIfExists('company');
    }
}
