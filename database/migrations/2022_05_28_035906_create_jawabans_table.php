<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuesioner_id');
            $table->foreign('kuesioner_id')->references('id')->on('kuesioners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jawaban');
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
        Schema::dropIfExists('jawabans');
    }
};
