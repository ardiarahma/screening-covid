<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerantauIdToWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->date('tanggal_lahir')->after('nik')->nullable();
            $table->char('rw',2)->after('village_id')->nullable();
            $table->char('rt',2)->after('rw')->nullable();
            $table->integer('perantau_id')->after('status_kependudukan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wargas', function (Blueprint $table) {
            //
        });
    }
}
