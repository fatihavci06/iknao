<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkgozlemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikgozlems', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('yonetici')->nullable();
            $table->integer('kampus')->nullable();
            $table->integer('ders')->nullable();
            $table->integer('sube')->nullable();
            $table->text('ders_konu')->nullable();
            $table->datetime('tarih')->nullable();
            $table->string('goztur')->nullable();
            $table->text('gozlemnotu')->nullable();
            $table->string('b1k1')->nullable();
            $table->text('aciklama1')->nullable();
            $table->string('b1k2')->nullable();
            $table->string('b1k3')->nullable();
            $table->string('b1k4')->nullable();
            $table->string('b1k5')->nullable();
            $table->string('b1k6')->nullable();
            $table->string('b1k7')->nullable();
            $table->string('b1k8')->nullable();
            $table->string('b2k1')->nullable();
            $table->text('aciklama2')->nullable();
            $table->string('b2k2')->nullable();
            $table->string('b2k3')->nullable();
            $table->string('b2k4')->nullable();
            $table->string('b2k5')->nullable();
            $table->string('b2k6')->nullable();
            $table->string('b2k7')->nullable();
            $table->string('b2k8')->nullable();
            $table->string('b2k9')->nullable();
            $table->string('b2k10')->nullable();
            $table->string('b2k11')->nullable();
            $table->string('b2k12')->nullable();
            $table->string('b2k13')->nullable();
            $table->string('b3k1')->nullable();
            $table->text('aciklama3')->nullable();
            $table->string('b3k2')->nullable();
            $table->string('b3k3')->nullable();
            $table->string('b3k4')->nullable();
            $table->string('b3k5')->nullable();
            $table->string('b3k6')->nullable();
            $table->string('b3k7')->nullable();


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
        Schema::dropIfExists('ikgozlems');
    }
}
