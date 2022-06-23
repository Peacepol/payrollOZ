<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperfundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superfunds', function (Blueprint $table) {
            $table->id();
			$table->string('product_name');
			$table->string('registered_name');
			$table->string('physical_address_line_1');
			$table->string('physical_address_line_2');
			$table->string('physical_suburb');
			$table->string('physical_state');
			$table->string('physical_post_code');
			$table->string('postal_address_line_1');
			$table->string('postal_address_line_2');
			$table->string('postal_suburb');
			$table->string('postal_state');
			$table->string('postal_post_code');
			$table->string('contact_phone');
			$table->string('email');
			$table->string('abn');
			$table->string('bsb_account_number');
			$table->string('website_url');
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
        Schema::dropIfExists('superfunds');
    }
}
