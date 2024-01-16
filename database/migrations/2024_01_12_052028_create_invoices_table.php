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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->nullable(); // Until dispatch the invoice id is not generated
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('company_id');
            $table->string('deadline')->nullable();
            $table->string('previous_amount')->nullable();
            $table->string('received_amount')->nullable();
            $table->string('carried_over')->nullable();
            $table->string('purchased_amount')->nullable();
            $table->string('consumption_tax')->nullable();
            $table->string('total_purchase')->nullable();
            $table->string('current_purchase_amount')->nullable();
            $table->string('regular_tax_amount')->nullable();
            $table->string('reduced_tax_amount')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
