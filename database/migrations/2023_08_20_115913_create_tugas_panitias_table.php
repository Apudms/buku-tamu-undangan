<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasPanitiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_panitias', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_tugas')->unique();
            $table->string('pengantin_id', 36);
            $table->timestamps();
            $table->foreign('pengantin_id')->references('id')->on('pengantins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_panitias');
    }
}
