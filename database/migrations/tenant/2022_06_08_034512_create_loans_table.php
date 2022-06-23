<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->double('loan_amt')->nullable();
            $table->double('loan_bal')->nullable();
            $table->double('loan_dedamt')->nullable();
            $table->date('loan_advdate')->nullable();
            $table->date('loan_dedstart')->nullable();
            $table->string('loan_flag')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
