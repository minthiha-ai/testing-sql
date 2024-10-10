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
        Schema::create('sale_command_document', function (Blueprint $table) {
            $table->bigIncrements('sale_command_document_id');
            $table->timestamp('sale_command_document_datenow');
            $table->string('sale_command_document_no');
            $table->unsignedBigInteger('sale_command_status_id');
            $table->string('create_empcode');
            $table->timestamp('edit_date')->nullable();
            $table->string('computer_name');
            $table->string('customer_name');
            $table->string('customer_code');
            $table->string('customer_gender');
            $table->string('customer_address');
            $table->decimal('total_amount', 15, 2);
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->decimal('net_amount', 15, 2);
            $table->integer('customer_age')->nullable();
            $table->boolean('sale_command_document_active')->default(true);
            $table->string('branch_code');
            $table->decimal('vat_amount', 15, 2)->nullable();
            $table->decimal('vat_base_amount', 15, 2)->nullable();
            $table->unsignedBigInteger('gbh_customer_id')->nullable();
            $table->string('sale_command_status_name');
            $table->decimal('sale_command_document_balance_amount', 15, 2)->nullable();
            $table->text('sale_command_document_comment')->nullable();
            $table->string('fix_address_sale_code')->nullable();
            $table->string('edit_emplcode')->nullable();
            $table->unsignedBigInteger('sale_command_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_command_document');
    }
};
