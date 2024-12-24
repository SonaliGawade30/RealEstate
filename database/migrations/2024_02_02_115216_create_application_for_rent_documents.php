<?php
use App\Models\ApplicationForRent;
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
        Schema::create('application_for_rent_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ApplicationForRent::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_for_rent_documents');
    }
};
