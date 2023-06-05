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
        Schema::create('bancarias', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('url')->unique();
            $table->string('tipo_conta', 1)->default('P'); // P = Poupança - C = Corrente - S = Sálario
            $table->string('agencia');
            $table->string('numero')->unique();
            $table->string('digito', 1);
            $table->foreignId('banco_id')->constrained()->onDelete('cascade');
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancarias');
    }
};
