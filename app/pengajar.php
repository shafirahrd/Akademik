<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengajar extends Model
{
    protected $primaryKey = 'kpj';
    public $incrementing = true;

    protected $fillable = ['kodenya','nipnya'];


    public function matkuls(){
    	return $this->belongsTo('App\matkul','kodenya','kodemk');
    }

    public function dosens(){
    	return $this->belongsTo('App\dosen','nipnya','nip');
    }
}
