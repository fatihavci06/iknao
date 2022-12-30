<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdayprofilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adayprofils', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->integer('brans_id')->nullable();
            $table->integer('kampus')->nullable();
            $table->integer('birim')->nullable();
            $table->integer('sistem_rol')->nullable();
            $table->integer('portal_rol')->nullable();
            $table->text('ekgorev')->nullable();
            $table->string('etutvercekmi')->nullable();
            $table->integer('user_id');
            $table->string('birtercih')->nullable();
            $table->string('ikitercih')->nullable();
            $table->string('uctercih')->nullable();
            $table->string('adressabahservis')->nullable();
            $table->string('adresaksamservis')->nullable();
            $table->string('adres')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->date('dtarihi')->nullable()->comment('dogum_tarihi');
            $table->string('dyeri')->nullable()->comment('dogum_yeri');
            $table->string('cocuk')->nullable()->comment('cocuk bilgileri');
            $table->integer('evlilik_durumu')->nullable()->comment('1:Bekar,2:Evli');
            $table->integer('askerlik_durumu')->nullable()->comment('1:Yapıldı,2:Bayan muaf,3:Tecilli,4:Yapılmadı,5:Sağlık Sebiyle Muaf');
            $table->date('tecil')->nullable()->comment('askerlikteciltarihi');
            $table->string('kangrubu')->nullable();


            $table->string('acilkisi')->nullable();
            $table->string('acilkisitel')->nullable();
            $table->string('sonOkulderece')->nullable();
            $table->string('lisMezTar')->nullable();
            $table->integer('sonOkul_id')->nullable();
            $table->integer('lisUni')->nullable();
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
            $table->integer('isSev')->nullable();
            $table->text('ofisArac')->nullable();
            $table->text('kurs')->nullable();
            $table->text('dernek')->nullable();
            $table->text('uzmanlik')->nullable();
            $table->text('notlar')->nullable();
            $table->text('ref1')->nullable();
            $table->text('ref2')->nullable();
            $table->text('ref3')->nullable();
            $table->integer('smsonay')->nullable()->comment('0:hayır,1:evet');
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
        Schema::dropIfExists('adayprofils');
    }
}
