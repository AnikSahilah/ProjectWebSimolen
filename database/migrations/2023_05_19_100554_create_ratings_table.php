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
        Schema::create('tb_rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bengkel_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('bengkel_id')->references('id')->on('tb_bengkel')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('tb_customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rating');
    }
};
