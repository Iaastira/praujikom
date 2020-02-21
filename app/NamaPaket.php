<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class NamaPaket extends Model
{
    protected $fillable = ['Nama_Paket','Jenis_Paket','Deskripsi'];
    public $timestamps = true;
}
