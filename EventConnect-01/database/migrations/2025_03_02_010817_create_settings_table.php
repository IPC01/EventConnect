<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('cancel_start_fee', 10, 2);
            $table->decimal('cancel_end_fee', 10, 2);
            $table->decimal('late_pct', 5, 2);
            $table->decimal('on_time_pct', 5, 2);
            $table->integer('base_time');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('settings');
    }
};
