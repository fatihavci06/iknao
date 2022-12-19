<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzınUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izın_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('askerlik_izni')->nullable();
            $table->integer('babalik_izni')->nullable();
            $table->integer('dogum_izni')->nullable();
            $table->integer('dogum_sonrasi_izin')->nullable();
            $table->integer('evlilik_izni')->nullable();
            $table->integer('hastalik_izni')->nullable();
            $table->integer('isarama_izni')->nullable();
            $table->integer('mazaret_izni')->nullable();
            $table->integer('sut_izni')->nullable();
            $table->integer('ucretsiz_izin')->nullable();
            $table->integer('vefat_izni')->nullable();
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
        Schema::dropIfExists('izın_users');
    }
}
