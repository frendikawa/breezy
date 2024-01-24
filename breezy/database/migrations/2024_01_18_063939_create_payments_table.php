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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained();
            $table->enum('method',['cash','cashless'])->default('cash');
            $table->enum('confirm', ['Belum diterima','Sudah diterima'])->default('Belum diterima');
            $table->integer('proof')->nullable();
            $table->enum('status',['Pesanan dibuat','Pesanan disetujui','Sedang dikemas','Dalam perjalanan','Selesai'])->default('Pesanan dibuat');
            $table->timestamp('orderDate')->nullable();
            $table->timestamp('receivedDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
