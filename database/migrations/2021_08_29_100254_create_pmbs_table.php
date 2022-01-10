<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('no_daftar')->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('nik', 16);
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 10);
            $table->string('no_hp', 13);
            $table->string('alamat');
            $table->string('informasi', 25);
            $table->string('sekolah_asal', 50);
            $table->string('nama_ibu', 100);
            $table->integer('prodi_id')->unsigned();
            $table->string('kelas', 10);
            $table->string('status_ujian')->nullable();
            $table->string('grade', 1)->nullable();
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
        Schema::dropIfExists('pmbs');
    }
}
