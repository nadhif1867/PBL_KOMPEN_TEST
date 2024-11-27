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
        Schema::create('m_tugas_admin', function (Blueprint $table) {
            $table->id('tugas_admin_id');
            $table->unsignedBigInteger('admin_id')->index();
            $table->unsignedBigInteger('tugas_kompeten_id')->index();
            $table->text('deskripsi_tugas');
            $table->date('tanggal_tugas');
            $table->timestamps();

            $table->foreign('admin_id')->references('admin_id')->on('m_admin');
            $table->foreign('tugas_kompeten_id')->references('tugas_kompeten_id')->on('m_tugas_kompeten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tugas_admin');
    }
};
