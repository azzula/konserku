<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 60);
            $table->string('jenis_kelamin', 1);
            $table->string('phone', 20)->unique();
            $table->string('code')->unique();
            $table->string('tanggal_lahir');
            $table->string('id_konser');
            $table->string('kehadiran');
            $table->string('auth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
