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
        Schema::table('items', function (Blueprint $table) {
            // Adiciona a coluna id_category
            $table->unsignedBigInteger('id_category')->nullable(); // A coluna é do tipo big integer e pode ser nula, se necessário

            // Define a chave estrangeira
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Remove a chave estrangeira e a coluna id_category
            $table->dropForeign(['id_category']);
            $table->dropColumn('id_category');
        });
    }
};
