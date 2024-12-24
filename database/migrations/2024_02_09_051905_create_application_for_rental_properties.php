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
        Schema::create('application_for_rental_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained('zones');
            $table->string('allotment_no');
            $table->foreignId('party_reg_id')->constrained('party_registrations');
            $table->foreignId('religion_id')->constrained('religion_master');
            $table->enum('shared', ['handicapped', 'citizen','ex-serviceman']);
            $table->string('nature_of_buisness');
            $table->enum('type_of_allotment', ['others', 'ota','complex','hall']);
            $table->string('contract_duration');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('rent_per_month');
            $table->string('rent_increase');
            $table->enum('rent_increase_type', ['sure', 'percentage'])->default('sure');
            $table->string('increament_increase');
            $table->foreignId('rule_id')->constrained('rules');
            $table->foreignId('biling_type_id')->constrained('biling_types');
            $table->string('deposit');
            $table->string('agrement_file_upload');
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
        Schema::dropIfExists('application_for_rental_properties');
    }
};
