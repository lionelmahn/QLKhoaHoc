<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lich_su_diems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dang_ky_id')->constrained('dang_ky_khoa_hocs')->onDelete('cascade');
            $table->decimal('diem_cu', 5, 2)->nullable();
            $table->decimal('diem_moi', 5, 2);
            $table->timestamp('thoi_gian_cap_nhat')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lich_su_diems');
    }
};
