<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamuUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamu_undangans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_tamu');
            $table->text('alamat');
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
        Schema::dropIfExists('tamu_undangans');
    }
}
