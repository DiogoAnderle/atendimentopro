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
        Schema::create('responsavel_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('cliente_id');            
            $table->timestamps();

            $table->foreign('responsavel_id')
                    ->references('id')
                    ->on('responsaveis')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');;

            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('responsavel_clientes');
        Schema::enableForeignKeyConstraints();
    }
};
