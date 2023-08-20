<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumbangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumbangans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->enum('jenis_sumbangan', ['Uang', 'Barang'])->default('Barang');
            $table->string('nama_barang')->nullable();
            $table->decimal('nominal', $precision = 15, $scale = 0)->nullable();
            $table->string('jumlah')->nullable();
            $table->string('tamu_undangan_id', 36);
            $table->timestamps();
            $table->foreign('tamu_undangan_id')->references('id')->on('tamu_undangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sumbangans');
    }
}
