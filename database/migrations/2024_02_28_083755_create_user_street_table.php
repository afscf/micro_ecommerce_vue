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
        Schema::create('user_street', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('street');
            $table->string('street_nr');
            $table->string('postal_code');
            $table->string('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_street');
    }
};
