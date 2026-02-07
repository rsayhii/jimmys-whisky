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
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->after('sku');
            $table->string('top_notes')->nullable();
            $table->string('heart_notes')->nullable();
            $table->string('base_notes')->nullable();
            $table->string('scent_family')->nullable();
            $table->string('concentration')->nullable();
            $table->string('gender')->nullable();
            $table->string('season')->nullable();
            $table->string('image')->nullable();
            $table->json('variants')->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->boolean('taxable')->default(true);
            $table->string('collection')->nullable();
            $table->string('tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'top_notes',
                'heart_notes',
                'base_notes',
                'scent_family',
                'concentration',
                'gender',
                'season',
                'image',
                'variants',
                'discount_price',
                'taxable',
                'collection',
                'tags'
            ]);
        });
    }
};
