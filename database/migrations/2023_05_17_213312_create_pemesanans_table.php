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
        Schema::create('tb_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('montir_id');
            $table->integer('total');
            $table->date('tanggal_pemesanan');
            $table->enum('status', ['menunggu persetujuan', 'disetujui', 'selesai'])->default('menunggu persetujuan');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('tb_customer')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('montir_id')->references('id')->on('tb_montir')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemesanan');
    }
};
