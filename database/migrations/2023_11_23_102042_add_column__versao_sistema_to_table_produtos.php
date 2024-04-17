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
        Schema::table('produtos', function (Blueprint $table) {
            // Relacionamento
            $table->dropColumn('versao');
            $table->unsignedBigInteger('versao_sistema_id')->nullable();
            $table->foreign('versao_sistema_id')->references('id')->on('versoes_sistema')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('versao');
            $table->dropColumn('versao_sistema_id');
        });
        Schema::enableForeignKeyConstraints();
    }
};
