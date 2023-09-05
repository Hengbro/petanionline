<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamattokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamattokos', function (Blueprint $table) {
            $table->id();
            $table->integer('tokoId')->unsigned();
            $table->string('alamat');
            $table->string('label');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan')->nullable();
            $table->string('kodepos');
            $table->integer('provinsiId')->nullable();
            $table->integer('kotaId')->nullable();
            $table->integer('kecamatanId')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('alamattokos');
    }
}
