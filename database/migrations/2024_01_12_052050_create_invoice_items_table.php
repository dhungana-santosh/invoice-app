<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->date('voucher_date');
            $table->string('voucher_no');
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('unit');
            $table->double('unit_price');
            $table->double('purchase_price');
            $table->boolean('reduced_tax');
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
