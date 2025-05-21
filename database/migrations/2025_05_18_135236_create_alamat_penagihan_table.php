<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatPenagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_penagihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // relasi ke users

            // Data alamat penagihan
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('perusahaan')->nullable();
            $table->string('alamat1');
            $table->string('alamat2')->nullable();
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_hp');
            $table->string('email');

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_penagihan');
    }
}
