<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkmulakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikmulakats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('kampus')->nullable();
            $table->string('mulakat_tur')->nullable();
            $table->string('yetkili_kurucular')->nullable();
            $table->string('yetkili_yoneticiler')->nullable();
            $table->text('aciklama')->nullable();
            $table->integer('puan')->nullable();
            $table->datetime('tarih')->nullable();
            $table->string('belge')->nullable();
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
        Schema::dropIfExists('ikmulakats');
    }
}
