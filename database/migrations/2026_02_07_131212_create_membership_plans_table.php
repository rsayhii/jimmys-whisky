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
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., Gold Membership
            $table->string('slug')->unique(); // e.g., gold-membership
            $table->string('price')->nullable(); // e.g., Free, 999
            $table->text('description')->nullable();
            $table->integer('refill_slots')->default(0);
            $table->json('benefits')->nullable(); // Store array of benefits
            $table->string('status')->default('active'); // active, draft, archived
            $table->integer('duration_months')->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_plans');
    }
};
