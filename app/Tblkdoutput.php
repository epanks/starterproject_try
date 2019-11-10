<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblkdoutput extends Model
{
    protected $table = 'tblkdoutput';

    public function paket()
    {
        return $this->hasMany(Paket::class,'kdoutput','kdoutput');
    }

    public function tblabat()
    {
        return $this->belongsTo(Tblabat::class);
    }

    public function tblabjiat()
    {
        return $this->belongsTo(Tblabjiat::class);
    }

    public function tblrehabbangun()
    {
        return $this->belongsTo(Tblrehabbangun::class);
    }
}
