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
        Schema::create('probabilities', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('label_id');
            $table->string('type');
            $table->string('cukup_puas');
            $table->string('puas');
            $table->string('tidak_puas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('probabilities');
    }
};
