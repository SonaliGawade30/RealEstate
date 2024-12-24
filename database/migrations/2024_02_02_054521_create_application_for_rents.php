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
        Schema::create('application_for_rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained('zones');
            $table->foreignId('property_reg_id')->constrained('property_registrations');
            $table->string('unit_no');
            $table->foreignId('party_reg_id')->constrained('party_registrations');
            $table->string('reason_of_use');
            $table->timestamp('from_datetime')->useCurrent();
            $table->timestamp('to_datetime')->useCurrent();
            $table->mediumText('remark')->nullable();
            $table->decimal('deposit', 10, 2)->nullable();  
            $table->decimal('rent', 10, 2)->nullable();    
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('net_payable', 10, 2)->nullable();
            $table->decimal('cgst', 10, 2)->nullable();
            $table->decimal('sgst', 10, 2)->nullable();
            $table->decimal('actual_amount', 10, 2)->nullable();
            $table->string('application_status')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_for_rents');
    }
};
