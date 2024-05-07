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
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kategori_id');
            $table->string('nama_produk');
            $table->string('merk');
            $table->integer('harga_beli');
            $table->integer('diskon')->nullable()->default(0);
            $table->integer('stok')->default(0);
            $table->integer('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
