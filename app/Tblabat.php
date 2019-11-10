<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblabat extends Model
{
    protected $table = 'tblabat';
    public function tblkdoutput()
    {
        return $this->belongsTo(Tblkdoutput::class);
    }
}
