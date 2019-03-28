<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mhs extends Model
{
    protected $primaryKey = 'nrp';
    public $incrementing = false;

    protected $fillable = ['nrp','nama','nipdosenwali'];


    public function dosens(){
    	return $this->belongsTo('App\dosen','nipdosenwali','nip');
    }

    public function pesertas(){
    	return $this->hasMany('App\peserta','nrpnya','nrp');
    }
}
