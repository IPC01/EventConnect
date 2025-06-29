<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id_package')->nullable()->after('id_event_type');
            // Se quiser relacionar com a tabela de pacotes, descomente a linha abaixo:
            // $table->foreign('id_package')->references('id')->on('event_packages')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // $table->dropForeign(['id_package']); // Se você adicionou foreign key
            $table->dropColumn('id_package');
        });
    }
};
