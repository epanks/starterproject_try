<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masalah extends Model
{
    protected $table = 'masalah';
    protected $fillable = [
        'masalah','slug','tindaklanjut','keterangan','paket_id','lampiran'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
