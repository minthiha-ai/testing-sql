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
        Schema::create('sale_command_item', function (Blueprint $table) {
            $table->bigIncrements('sale_command_item_id');
            $table->timestamp('sale_command_item_datenow');
            $table->boolean('sale_command_item_active')->default(true);
            $table->integer('sale_command_item_listno');
            $table->unsignedBigInteger('sale_command_document_id');
            $table->string('sale_command_document_no');
            $table->unsignedBigInteger('product_id');
            $table->string('product_code');
            $table->string('barcode_code');
            $table->string('barcode_bill_name');
            $table->string('unit_code');
            $table->decimal('product_price1', 15, 2);
            $table->decimal('price_sale', 15, 2);
            $table->decimal('price_sale_amount', 15, 2);
            $table->integer('sale_amount');
            $table->timestamp('sale_command_item_controldate');
            $table->boolean('vat_type')->default(false);
            $table->decimal('vat_amount', 15, 2)->default(0);
            $table->unsignedBigInteger('diposit_type_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('sale_command_document_id')
            ->references('sale_command_document_id')
            ->on('sale_command_document')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_command_item');
    }
};
