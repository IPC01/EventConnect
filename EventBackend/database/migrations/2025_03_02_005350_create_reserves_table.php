<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->constrained('orders')->onDelete('cascade');
            $table->foreignId('id_package')->constrained('eventPackage')->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserves');
    }
};
