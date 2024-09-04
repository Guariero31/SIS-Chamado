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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tecnico_id')->nullable()->constrained('users');
            $table->foreignId('subcategoria_id')->nullable()->constrained('subcategorias');
            $table->text('descricao');
            $table->enum('prioridade', ['baixa', 'media', 'alta']);
            $table->enum('status', ['aberto', 'em andamento', 'resolvido', 'fechado']);
            $table->timestamp('data_abertura')->useCurrent();
            $table->timestamp('data_atualizacao')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('data_conclusa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
