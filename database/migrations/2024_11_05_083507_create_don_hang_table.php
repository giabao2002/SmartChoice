<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id_don_hang');
            $table->unsignedInteger('id_user'); // Thay đổi thành unsignedInteger
            $table->string('ten_nguoi_nhan');
            $table->string('sdt');
            $table->string('dia_chi_nhan');
            $table->string('ghi_chu')->nullable();
            $table->string('tong_tien')->nullable();
            $table->string('hinh_thuc_thanh_toan');
            $table->enum('trang_thai', ['Đang xử lý', 'Đã xác nhận', 'Đã hoàn thành', 'Đã hủy'])->default('Đang xử lý');
            $table->longText('hoa_don');
            $table->timestamps();

            // Thêm foreign key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
