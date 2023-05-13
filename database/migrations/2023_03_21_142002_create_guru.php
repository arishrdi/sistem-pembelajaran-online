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
        Schema::create('guru', function (Blueprint $table) {
             // $table->id();
             $table->id('nip');
             $table->foreignId('id_user');
             $table->string('nama_guru');
             $table->string('gelar');
             $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
             $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha']);
             $table->date('tanggal_lahir');
             $table->string('alamat');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
