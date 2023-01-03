<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkperformansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikperformans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('baslik')->nullable();
            $table->string('mulakat_tur')->nullable();
            $table->string('belge')->nullable();
            $table->datetime('tarih')->nullable();
            $table->text('description')->nullable();
            $table->string('s1')->nullable();
            $table->text('aciklama1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('s4')->nullable();
            $table->string('s5')->nullable();
            $table->string('s6')->nullable();
            $table->text('aciklama6')->nullable();
            $table->string('s7')->nullable();
            $table->string('s8')->nullable();
            $table->text('aciklama8')->nullable();
            $table->string('s9')->nullable();
            $table->text('aciklama9')->nullable();
            $table->string('s10')->nullable();
            $table->text('aciklama10')->nullable();
            $table->string('s11')->nullable();
            $table->text('aciklama11')->nullable();
            $table->string('s12')->nullable();
            $table->text('aciklama12')->nullable();
            $table->string('s13')->nullable();
            $table->text('aciklama13')->nullable();
            $table->string('s14')->nullable();
            $table->text('aciklama14')->nullable();
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
        Schema::dropIfExists('ikperformans');
    }
}
