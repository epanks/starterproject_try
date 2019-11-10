<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblrehabbangun extends Model
{
    protected $table = 'tblrehabbangun';
    public function tblkdoutput()
    {
        return $this->belongsTo(Tblkdoutput::class);
    }
}
