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
        Schema::create('riwayat_diagnosa', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->biginteger('id_user')->unsigned();
            $table->string('nama', 100);
            $table->string('umur');
            $table->string('alamat');
            $table->string('telp');
            $table->String('hasil_diagnosa');
            $table->text('rekomendasi_treatment');
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
        Schema::dropIfExists('riwayat_diagnosa');
    }
};
