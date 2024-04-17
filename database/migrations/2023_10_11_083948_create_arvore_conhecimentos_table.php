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
        Schema::create('arvore_conhecimentos', function (Blueprint $table) {
            $table->id();
            $table->string('assunto');
            
            //Criando Relacionamento one to many com usuario
            $table->unsignedBigInteger('user_id')->nullable()->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            //Criando Relacionamento one to many com grupo
            $table->unsignedBigInteger('grupo_id')->nullable()->default(1);
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('set null')->onUpdate('cascade');
            
            //Criando Relacionamento one to many com subgrupo
            $table->unsignedBigInteger('subgrupo_id')->nullable()->default(1);
            $table->foreign('subgrupo_id')->references('id')->on('subgrupos')->onDelete('set null')->onUpdate('cascade');
            
            $table->longText('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arvore_conhecimentos');
    }
};
