<?php

use App\Models\Barang;
use App\Models\Supplier;
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
        Schema::create('barangmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barangmasuk', 40);
            $table->date('tanggal_masuk');
            $table->foreignIdFor(Barang::class)->constrained('barangs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->foreignIdFor(Supplier::class)->constrained('suppliers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangmasuks');
    }
};
