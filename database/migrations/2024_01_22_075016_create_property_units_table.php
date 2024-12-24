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
        Schema::create('property_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_reg_id')->constrained('property_registrations');
            $table->string('unit_no')->nullable();
            $table->string('area',100)->nullable();
            $table->string('floor',100)->nullable();
            $table->foreignId('type_of_use_id')->nullable()->constrained('type_of_use');
            $table->foreignId('estate_id')->nullable()->constrained('estates');
            $table->enum('lease_rent', ['lease', 'rent', 'self_owner'])->default('rent');
            $table->string('document')->nullable();
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
        Schema::dropIfExists('property_units');
    }
};
