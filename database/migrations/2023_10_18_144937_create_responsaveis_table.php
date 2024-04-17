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
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',100);
            $table->string('lastName',100);
            $table->dateTime('dataNascimento')->nullable()->default(null); 
            $table->string('email',100)->nullable()->default('Email Não Informado');
            $table->string('telefone',15)->nullable()->default('Não Informado');
            $table->string('whatsapp',15)->nullable()->default('Não Informado');
            $table->string('cargo',50)->nullable()->default('Cargo Não Informado');
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
        Schema::dropIfExists('responsaveis');
    }
};
