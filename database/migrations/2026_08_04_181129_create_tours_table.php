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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            // General Info
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('duration')->nullable();
            $table->string('accommodation')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            
            // Pricing
            $table->string('price_sharing')->nullable();
            $table->string('price_single')->nullable();
            $table->string('discount_returning')->nullable();
            $table->string('discount_early')->nullable();
            $table->string('inst_deposit')->nullable();
            $table->string('inst_1')->nullable();
            $table->string('inst_2')->nullable();
            $table->string('inst_final')->nullable();
            
            // Terms
            $table->text('inclusions')->nullable();
            $table->text('exclusions')->nullable();
            $table->string('director')->nullable();
            $table->string('director_phone')->nullable();
            
            // JSON Columns for Dynamic data
            $table->json('flights')->nullable();
            $table->json('itinerary')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
