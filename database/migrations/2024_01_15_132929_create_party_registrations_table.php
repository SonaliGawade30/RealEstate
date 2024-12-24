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
        Schema::create('party_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('party_name',100);
            $table->string('buisness_name',100);
            $table->string('address');
            $table->string('email');
            $table->string('mobile_no',20);
            $table->string('pancard_no',20);
            $table->string('aadhaar_no',20);
            $table->string('gst_no',20);
            $table->string('upload_document');
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
        Schema::dropIfExists('party_registrations');
    }
};
