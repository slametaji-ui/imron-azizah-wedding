<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('konfirmasi_kehadiran')->default('hadir'); // bisa 'hadir' atau 'tidak_hadir'
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('konfirmasi_kehadiran');
        });
    }
};
