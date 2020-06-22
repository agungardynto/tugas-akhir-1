<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 1);
            $table->integer('umur');
            $table->bigInteger('jabatan_id')->unsigned();
            $table->bigInteger('pendidikan_id')->unsigned();
            $table->bigInteger('nomor_hp');
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
