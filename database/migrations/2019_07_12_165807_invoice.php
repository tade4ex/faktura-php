<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->string('invoice_number');
            $table->string('invoice_date');
            $table->string('seller_to_type');
            $table->string('seller_to_name');
            $table->string('seller_to_nip');
            $table->string('seller_to_address');
            $table->string('seller_to_zipcode');
            $table->string('seller_to_city');
            $table->string('item_description');
            $table->integer('item_count');
            $table->double('item_price');
            $table->integer('item_vat');
            $table->double('item_price_vat');
            $table->double('item_price_sum_netto');
            $table->double('item_price_sum_brutto');
            $table->integer('pay_type');
            $table->string('pay_date');
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
        Schema::dropIfExists('invoices');
    }
}
