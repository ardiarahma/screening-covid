<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSkorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_skors', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_screening')->nullable();
            $table->string('kategori_hasil')->nullable();
            $table->string('hasil')->nullable();
            $table->text('interpretasi')->nullable();
            $table->text('tatalaksana')->nullable();
            $table->integer('batas_bawah')->nullable();
            $table->integer('batas_atas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_skors');
    }
}
