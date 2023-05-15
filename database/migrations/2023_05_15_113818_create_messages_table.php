<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('jabatan_pengirim');
            $table->string('email_pengirim');
            $table->string('phone_pengirim');
            $table->string('sekolah_nama');
            $table->string('sekolah_jurusan');
            $table->string('sekolah_kelas');
            $table->string('sekolah_tingkat');
            $table->string('magang_bidang');
            $table->text('file_path')->nullable();
            $table->string('pesan_utama');
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
        Schema::dropIfExists('messages');
    }
};
