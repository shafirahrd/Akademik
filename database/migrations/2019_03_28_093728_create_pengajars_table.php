<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajars', function (Blueprint $table) {
            $table->increments('kpj');
            $table->string('kodenya',10);
            $table->string('nipnya',10);
            $table->timestamps();
        });

        Schema::table('pengajars',function($table){
            $table->foreign('kodenya')->references('kodemk')->on('matkuls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nipnya')->references('nip')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajars');
    }
}
