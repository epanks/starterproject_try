<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    public function satker()
    {
        return $this->belongsTo(Satker::class,'kdsatker','kdsatker');
    }

    public function balai()
    {
        return $this->belongsTo(Balai::class);
    }
}
