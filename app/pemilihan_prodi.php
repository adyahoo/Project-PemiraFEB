<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemilihan_prodi extends Model
{
    protected $fillable = ['id_prodi','id_calon','id_pemilih'];
}
