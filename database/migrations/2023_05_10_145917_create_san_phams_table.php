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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("ten_san_pham", 200)->nullable();
            $table->decimal("gia", 20, 0)->nullable();
            $table->text("mo_ta")->nullable();
            $table->string("anh_cover")->nullable();
            $table->bigInteger("id_nguoi_tao")
                ->nullable()
                ->index("idx_san_phams_id_nguoi_tao");
            $table->bigInteger("id_danh_muc")
                ->nullable()
                ->index("idx_san_phams_id_danh_muc");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
