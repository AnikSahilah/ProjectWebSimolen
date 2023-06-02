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
        Schema::create('tb_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['belum diproses', 'telah diproses', 'dalam pengiriman', 'selesai'])->default('belum diproses');
            $table->date('tanggal_pembelian');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('tb_customer')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('tb_barang')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pembelian');
    }
};
