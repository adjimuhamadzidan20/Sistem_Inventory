<?php

use App\Models\Barang;
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
        Schema::create('barangkeluars', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barangkeluar', 40);
            $table->date('tanggal_keluar');
            $table->foreignIdFor(Barang::class)->constrained('barangs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->string('tujuan', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangkeluars');
    }
};
