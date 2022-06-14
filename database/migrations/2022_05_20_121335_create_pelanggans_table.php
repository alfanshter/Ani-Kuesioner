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
        //jika status 1 maka pelanggan sudah mengisi kuisioner
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade');
            $table->string('nama_pelanggan', 50);
            $table->string('email', 30);
            $table->char('jenis_kelamin', 15);
            $table->string('no_telp', 15);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir', 25);
            $table->text('alamat');
            $table->integer('is_status')->default(0);
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
        Schema::dropIfExists('pelanggans');
    }
};
