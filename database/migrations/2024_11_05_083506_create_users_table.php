<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nguoi_dung');
            $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->string('ten_dang_nhap')->unique();
            $table->string('password');
            $table->unsignedInteger('id_phan_quyen');
            $table->foreign('id_phan_quyen')->references('id_phan_quyen')->on('phan_quyen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
