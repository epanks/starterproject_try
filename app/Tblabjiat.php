<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblabjiat extends Model
{
    protected $table = 'tblabjiat';
    public function tblkdoutput()
    {
        return $this->belongsTo(Tblkdoutput::class);
    }
}
