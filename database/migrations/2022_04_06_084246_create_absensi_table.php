<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_petugas', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('mall_id');
            $table->string('username');
            $table->string('jam_masuk_absen');
            $table->string('jam_keluar_absen');
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
        Schema::dropIfExists('absensi_petugas');
    }
}
