<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrasirwi', function (Blueprint $table) {
            //$table->id();
            $table->string('no_registrasi', 20)->primary();
            $table->dateTime('tanggal_registrasi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('mrn', 10);
            $table->string('umur', 100);
            $table->string('no_kamar', 10);
            $table->string('id_dokter', 11);
            $table->string('jenis_jaminan', 15)->nullable();
            $table->string('nama_jaminan', 100)->nullable();
            $table->string('user');
            $table->foreign('id_dokter')
                ->references('id_dokter')
                ->on('dokter')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasirwi');
    }
};
