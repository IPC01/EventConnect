<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('reserves', function (Blueprint $table) {
        $table->enum('status_pagamento', ['pendente', 'pago'])->default('pago');
    });
}

public function down()
{
    Schema::table('reserves', function (Blueprint $table) {
        $table->dropColumn('status_pagamento');
    });
}

};
