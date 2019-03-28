<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    protected $primaryKey = 'kpt';
    public $incrementing = true;

    protected $fillable = ['pkodenya','nrpnya','nilai'];


    public function matkuls(){
    	return $this->belongsTo('App\matkul','pkodenya','kodemk');
    }

    public function mhs(){
    	return $this->belongsTo('App\mhs','nrpnya','nrp');
    }
}
