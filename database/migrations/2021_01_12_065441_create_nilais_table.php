<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id');
            $table->foreignId('kelas_id');
            $table->foreignId('mapel_id');
            $table->foreignId('siswa_id');
            $table->integer('kkm')->nullable();
            $table->integer('tugas')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
            $table->string('predikat', 2)->nullable();
            $table->integer('status')->default(0)->nullable();
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
        Schema::dropIfExists('nilais');
    }
}
