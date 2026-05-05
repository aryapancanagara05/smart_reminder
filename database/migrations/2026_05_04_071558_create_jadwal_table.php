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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->text('catatan');
            $table->integer('waktu');
            $table->string('satuan_waktu');
            $table->enum('tingkat_kepentingan', ['tidak penting', 'penting', 'sangat penting'])->default('tidak penting');
            $table->enum('status', ['akan datang', 'selesai', 'terlewat'])->default('akan datang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
