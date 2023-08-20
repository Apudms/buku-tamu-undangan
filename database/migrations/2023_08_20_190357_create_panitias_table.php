<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanitiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panitias', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_panitia');
            $table->enum('jabatan', ['Ketua', 'Anggota'])->default('Anggota');
            $table->string('tugas_panitia_id', 36);
            $table->timestamps();
            $table->foreign('tugas_panitia_id')->references('id')->on('tugas_panitias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panitias');
    }
}
