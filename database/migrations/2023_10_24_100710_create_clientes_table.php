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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 18)->unique();
            $table->string('razaoSocial', 200);
            $table->string('nomeFantasia', 50);
            $table->string('telefone',15)->nullable()->default('Não Informado');
            $table->string('status', 1)->default('A');
            $table->string('cep', 8);
            $table->string('logradouro', 100);
            $table->string('numero', 10)->nullable()->default('S/N');
            $table->string('complemento', 100)->nullable()->default('');
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('ibge', 10);
            $table->string('uf', 2);
            $table->dateTime('dataInicioAtividade')->nullable()->default(null);
            $table->dateTime('dataInicioParceria')->nullable()->default(null); 
            $table->timestamps();

               //Criando Relacionamento one to many com usuario
            $table->unsignedBigInteger('user_id')->nullable()->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
