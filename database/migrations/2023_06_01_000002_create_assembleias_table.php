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
        Schema::create('assembleias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('ordem_dia');
            $table->date('data')->default('2014/10/11');
            $table->time('hora')->default('12:00:00');
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assembleias');
    }
};
