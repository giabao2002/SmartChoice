<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropDataToDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->json('props')->default(DB::raw('(JSON_ARRAY())'))->nullable()->after('hoa_don');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('don_hang', function (Blueprint $table) {
            $table->dropColumn('props');
        });
    }
}
