<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengantinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengantins', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('mempelai_pria');
            $table->string('mempelai_wanita');
            $table->string('nama_putra');
            $table->string('ibu_mempelai_pria');
            $table->string('bapak_mempelai_pria');
            $table->string('ibu_mempelai_wanita');
            $table->string('bapak_mempelai_wanita');
            $table->string('nama_ibu');
            $table->string('nama_bapak');
            $table->date('tanggal_acara');
            $table->text('alamat');
            $table->string('acara_id', 36);
            $table->timestamps();
            $table->foreign('acara_id')->references('id')->on('acaras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengantins');
    }
}
