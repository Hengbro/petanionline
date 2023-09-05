<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promomps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namapromomp');
            $table->string('deskripsipromomp');
            $table->string('syaratdanketentuan');
            $table->string('periodepromomp');
            $table->string('nominalpromomp');
            $table->string('kodepromomp');
            $table->string('gambarpromomp');
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
        Schema::dropIfExists('promomps');
    }
}
