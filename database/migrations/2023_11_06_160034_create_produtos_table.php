<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();

            // Relacionamento
            $table->unsignedBigInteger('cliente_id')->nullable()->default(1);
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable()->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->string('tipo_licenca');
            $table->string('versao');
            $table->string('status');


            $table->timestamps();

            // Dados Acesso
            $table->string('tipo_acesso')->nullable()->default('');
            $table->string('endereco_acesso')->nullable()->default('');
            $table->string('porta_acesso')->nullable()->default('');
            $table->string('usuario_acesso')->nullable()->default('');
            $table->string('senha_acesso')->nullable()->default('');
            $table->string('senha_aberta')->nullable()->default('Não Informado');
            $table->string('usuario_banco')->nullable()->default('');



            // Caminhos
            $table->string('caminho_atualiza')->nullable()->default('Não Informado');
            $table->string('caminho_banco')->nullable()->default('Não Informado');
            $table->string('caminho_executavel')->nullable()->default('Não Informado');
            $table->string('caminho_interno')->nullable()->default('Não Informado');
            $table->string('caminho_backup')->nullable()->default('Não Informado');
            $table->string('endereco_tzion')->nullable()->default('Não Informado');
            $table->string('endereco_zeus')->nullable()->default('Não Informado');



            // Produtos / Licenças

            $table->json('produtos_cliente');

            $table->string('quantidade_fatura', 3)->nullable()->default('0');
            $table->string('quantidade_financeiro', 3)->nullable()->default('0');
            $table->string('quantidade_importacao', 3)->nullable()->default('0');
            $table->string('quantidade_exportacao', 3)->nullable()->default('0');
            $table->string('total_licencas', 3)->nullable()->default('0');
            $table->string('estacoes_liberadas', 3)->nullable()->default('0');

            $table->longText('observacoes')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

