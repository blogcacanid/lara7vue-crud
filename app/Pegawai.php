<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = 'pegawai_id';
    protected $fillable = ['nip', 'nama_pegawai', 'alamat'];
}
