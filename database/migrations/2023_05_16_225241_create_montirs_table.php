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
        Schema::create('tb_montir', function (Blueprint $table) {
            $table->id();
            $table->text('alamat');
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->unsignedBigInteger('bengkel_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['avaible', 'dalam perjalanan', 'dalam pengerjaan', 'selesai'])->default('avaible');

            $table->foreign('bengkel_id')->references('id')->on('tb_bengkel')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_montir');
    }
};
