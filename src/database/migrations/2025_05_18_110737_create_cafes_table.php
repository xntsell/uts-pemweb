<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan')->unique();
            $table->string('nama_pelanggan');
            $table->char('jenis_kelamin', 1); // 'L' atau 'P'
            $table->integer('jumlah_kunjungan');
            $table->string('minuman_favorit');
            $table->bigInteger('total_pembelian'); // atau decimal jika perlu pecahan
            $table->boolean('member'); // true = Ya, false = Tidak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
