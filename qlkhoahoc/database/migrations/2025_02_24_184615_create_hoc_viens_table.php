<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocViensTable extends Migration
{
    public function up()
    {
        Schema::create('hoc_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('email')->unique();
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoc_viens');
    }
}
