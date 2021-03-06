<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSikapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sikaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id');
            $table->foreignId('kelas_id');
            $table->foreignId('siswa_id');
            $table->string('akhlak')->nullable();
            $table->string('kerajinan')->nullable();
            $table->string('kedisiplinan')->nullable();
            $table->string('kebersihan_dan_kerapihan')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('nilai_sikaps');
    }
}
