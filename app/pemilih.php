<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemilih extends Model
{
    protected $fillable = ['nim','email','nama','prodi','angkatan','screenshot','password','flag'];

    public function prodi(){
        return $this->belongsTo(prodi::class, 'prodi');
    }
    public function angkatan(){
        return $this->belongsTo(angkatan::class, 'angkatan');
    }
}
