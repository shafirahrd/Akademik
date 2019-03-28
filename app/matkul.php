<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $primaryKey = 'kodemk';
    public $incrementing = false;

    protected $fillable = ['kodemk','nmatkul','sks'];


    public function pengajars(){
    	return $this->hasMany('App\pengajar','kodenya','kodemk');
    }

    public function pesertas(){
    	return $this->hasMany('App\peserta','pkodenya','kodemk');
    }
}
