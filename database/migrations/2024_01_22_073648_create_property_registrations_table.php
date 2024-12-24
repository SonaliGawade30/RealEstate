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
        Schema::create('property_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained('zones');
            $table->foreignId('property_type_id')->constrained('property_types');
            $table->string('property_no');
            $table->string('old_property_no')->nullable();
            $table->string('property_name');
            $table->string('property_address');
            $table->string('mauja');
            $table->string('sheet_no');
            $table->string('plot_no');
            $table->string('area');
            $table->string('ready_reckoner_rate');
            $table->string('valuation');
            $table->foreignId('source_id')->constrained('sources');
            $table->enum('development_status', ['undeveloped', 'developed'])->default('undeveloped')->comment('undeveloped = not developed, developed = developed');
            $table->date('date_of_acquisition');
            $table->string('remark');
            $table->decimal('latitude', 10, 6)->nullable(); 
            $table->decimal('longitude', 10, 6)->nullable(); 
            $table->string('property_photo_upload')->nullable(); 
            $table->string('dp_plan_upload')->nullable(); 
            $table->enum('unit_type', ['one_unit', 'multiple_units'])->default('one_unit');
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
        Schema::dropIfExists('property_registrations');
    }
};
