<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->id();
            // $table->string('nip')->nullable();
            // $table->string('nama')->nullable();
            $table->foreignId('guru_id')->nullable();
            $table->string('ttd')->nullable();
            // $table->string('tempat_lahir')->nullable();
            // $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->foreignId('kelas_id')->nullable();
            // $table->string('hp')->nullable();
            $table->string('email')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
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
        Schema::dropIfExists('wali_kelas');
    }
}
