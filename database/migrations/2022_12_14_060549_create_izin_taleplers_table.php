<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinTaleplersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_taleplers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('amir_id');
            $table->integer('izin_tur');
            $table->dateTime('baslangic_tarih');
            $table->dateTime('bitis_tarih');
            $table->text('aciklama')->nullable();
            $table->string('belge')->nullable();
            $table->integer('durum')->default(0)->nullable('0:beklemede,1:onaylandı,2:reddedildi');
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
        Schema::dropIfExists('izin_taleplers');
    }
}
