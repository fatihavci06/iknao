<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilans', function (Blueprint $table) {
            $table->id();
            $table->string('ilan_name');
            $table->string('slug')->nullable();
            $table->string('istur');
            $table->string('konum');
            $table->string('kampus');
            $table->text('description');
            $table->date('endDate')->nullable();
            $table->integer('durum')->comment('1:pasif,2:aktif')->default(2);
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
        Schema::dropIfExists('ilans');
    }
}
