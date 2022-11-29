<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('rol')->default(0);
            $table->integer('tc')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->int('brans_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('birtercih')->nullable();
            $table->string('ikitercih')->nullable();
            $table->string('uctercih')->nullable();
            $table->string('cepno')->nullable();
            $table->text('adres')->nullable();
            $table->string('eposta')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->date('dtarihi')->nullable();
            $table->string('dyeri')->nullable();
            $table->string('cocuk')->nullable();
            $table->integer('medenidurum')->comment('1:Bekar,2:Evli')->nullable();
            $table->string('askerlikdurum')->comment('1:Yapıldı,2:Bayan muaf,3:Tecilli,4:Yapılmadı,5:Sağlık Sebiyle Muaf')->nullable();
            $table->date('tecil')->nullable();
            $table->string('kangrubu')->nullable();
            $table->string('acilkisi')->nullable();
            $table->string('acilkisitel')->nullable();
            $table->string('sonOkulderece')->nullable();
            $table->integer('lisMezTar')->nullable();
            $table->integer('sonOkul')->nullable();
            $table->string('lFak')->nullable();
            $table->string('yLuni')->nullable();
            $table->string('yLisfak')->nullable();
            $table->string('yDokUni')->nullable();
            $table->string('yDokBolum')->nullable();
            $table->text('tecrube')->nullable();
            $table->text('staj')->nullable();
            $table->integer('ingSev')->nullable();
            $table->integer('almSev')->nullable();
            $table->integer('frSev')->nullable();
            $table->integer('isSev')->comment('İspanyolca')->nullable();
            $table->text('ofisArac')->nullable();
            $table->text('kurs')->nullable();
            $table->text('dernek')->nullable();
            $table->text('uzmanlik')->nullable();
            $table->text('notlar')->nullable();
            $table->text('ref1')->nullable();
            $table->text('ref2')->nullable();
            $table->text('ref3')->nullable();
            $table->integer('smsonay')->nullable();
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
        Schema::dropIfExists('users');
    }
}
