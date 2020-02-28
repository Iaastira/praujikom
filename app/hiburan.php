<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class hiburan extends Model
{
    protected $fillable = ['Judul','foto','Deskripsi'];
    public $timestamps = true;
}
