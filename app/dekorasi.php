<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dekorasi extends Model
{
    protected $fillable = ['judul','foto','deskripsi'];
    public $timestamps = true;
}
