<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('eventPackage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_event_hall')->constrained('event_hall')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menu')->onDelete('cascade');
            $table->foreignId('id_decoration')->constrained('decoration')->onDelete('cascade');
            $table->foreignId('id_event_type')->constrained('event_types')->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('eventPackage');
    }
};
