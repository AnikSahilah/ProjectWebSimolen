<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bengkel_id');
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->integer('harga');
            $table->string('merek');
            $table->string('spesifikasi');
            $table->integer('stok');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('bengkel_id')->references('id')->on('tb_bengkel')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barang');
    }
};
