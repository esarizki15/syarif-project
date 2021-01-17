<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_totals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id')->nullable();
            $table->foreignId('kelas_id')->nullable();
            $table->foreignId('siswa_id')->nullable();
            $table->integer('nilai')->default(0)->nullable();
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
        Schema::dropIfExists('nilai_totals');
    }
}
