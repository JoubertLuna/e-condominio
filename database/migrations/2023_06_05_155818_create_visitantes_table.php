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
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('url')->unique();
            $table->string('rg', 20)->nullable()->unique();
            $table->string('cpf', 20)->nullable();
            $table->foreignId('bloco_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('data_entrada')->default('2014/10/11')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->date('data_saida')->default('2014/10/11')->nullable();
            $table->time('hora_saida')->nullable();
            $table->text('obs')->nullable();
            $table->string('image')->default('default.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};
