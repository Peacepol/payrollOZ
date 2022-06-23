<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('accum_id');
            $table->string('pay_mode',1);
            $table->double('pay_fixamt',11,2)->default(0);
            $table->double('pay_percent',11,2)->default(0);
            $table->string('tax_flag',3);
            $table->double('tax_rate', 11,2)->default(0);
            $table->integer('super_id');
            $table->string('tax_spread',1);
            $table->integer('sequence')->default(0);
            $table->integer('gl_id')->default(0);
            $table->integer('bc_number');
            $table->integer('bd_number');
            $table->integer('isleaveaccrual')->default(0);
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
        Schema::dropIfExists('pay_items');
    }
}
