<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('isi');
            $table->string('file_path')->after('penulis');
        });
    }

    
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('file_path');
            $table->text('isi');
        });
    }
};
