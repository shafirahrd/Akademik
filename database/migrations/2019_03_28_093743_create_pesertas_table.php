<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->increments('kpt');
            $table->string('pkodenya',10);
            $table->string('nrpnya',15);
            $table->string('nilai',5);
            $table->timestamps();
        });

        Schema::table('pesertas',function($table){
            $table->foreign('pkodenya')->references('kodemk')->on('matkuls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nrpnya')->references('nrp')->on('mhs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}
