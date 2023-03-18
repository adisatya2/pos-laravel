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
        Schema::create('pasien_pulang', function (Blueprint $table) {
            $table->id();
            $table->string('no_kamar', 10);
            $table->string('kode_ruangan', 10);
            $table->unsignedInteger('id_kelas');
            $table->string('no_registrasi', 100)->nullable();
            $table->string('mrn', 10)->nullable();
            $table->string('nama_pasien', 100)->nullable();
            $table->string('diagnosa', 100)->nullable();
            $table->string('id_dokter', 11)->nullable();
            $table->string('jenis_jaminan', 15)->nullable();
            $table->string('nama_jaminan', 100)->nullable();
            $table->string('hak_pasien', 100)->nullable();
            $table->string('bed_hinai', 15)->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->dateTime('tanggal_pindah')->nullable();
            $table->dateTime('tanggal_pulang')->nullable();
            $table->text('keterangan_pulang')->nullable()->default(null);
            $table->string('user_input', 15)->nullable();
            $table->string('user_pindah', 15)->nullable();
            $table->string('user_pulang', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_pulang');
    }
};
