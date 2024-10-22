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
        // Menambahkan kolom 'avatar' pada tabel 'm_user'
        Schema::table('m_user', function (Blueprint $table) {
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom 'avatar' dari tabel 'm_user'
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
};
