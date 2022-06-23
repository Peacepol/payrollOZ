<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpsuperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empsuper', function (Blueprint $table) {
            $table->id();
			$table->integer('emp_id');
			$table->integer('sup_id')->nullable();
			$table->string('sup_no', 30)->nullable();
			$table->date('sup_commence')->nullable();
			$table->integer('sup_num')->nullable();
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
        Schema::dropIfExists('empsuper');
    }
}
