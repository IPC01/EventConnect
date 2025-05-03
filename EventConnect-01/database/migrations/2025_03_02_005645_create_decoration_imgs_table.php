<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('decoration_imgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_img')->constrained('images')->onDelete('cascade');
            $table->foreignId('id_decoration')->constrained('decorations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('decoration_imgs');
    }
};

