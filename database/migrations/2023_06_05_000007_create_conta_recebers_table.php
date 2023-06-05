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
        Schema::create('conta_recebers', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('url')->unique();
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->date('data')->default('2014/10/11');
            $table->foreignId('bancaria_id')->constrained()->onDelete('cascade');
            $table->decimal('valor', 10, 2)->default(0.00);
            $table->string('pago', 1)->default('N'); //N = Não - S = Sim
            $table->foreignId('bloco_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('obs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conta_recebers');
    }
};
