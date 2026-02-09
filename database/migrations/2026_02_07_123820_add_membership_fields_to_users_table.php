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
        Schema::table('users', function (Blueprint $table) {
            $table->string('membership_type')->nullable()->after('password');
            $table->date('membership_start_date')->nullable()->after('membership_type');
            $table->date('membership_end_date')->nullable()->after('membership_start_date');
            $table->integer('refill_requests_balance')->default(0)->after('membership_end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'membership_type',
                'membership_start_date',
                'membership_end_date',
                'refill_requests_balance',
            ]);
        });
    }
};
