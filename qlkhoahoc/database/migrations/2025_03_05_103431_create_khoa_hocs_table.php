<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('khoa_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khoa_hoc');
            $table->integer('so_tin_chi');
            $table->string('giang_vien');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khoa_hocs');
    }
};
