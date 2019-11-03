<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected $fillable = [
        'kdsatker', 'nmpaket', 'pagurmp', 'trgoutput', 'satoutput', 'trgoutcome', 'satoutcome','kdoutput','TahunFisik','pagurmawal','keuangan','progres_fisik'
    ];

    public function satker()
    {
        return $this->belongsTo(Satker::class,'kdsatker','kdsatker');
    }

    public function balai()
    {
        return $this->belongsTo(Balai::class);
    }

    public function masalah()
    {
        return $this->hasMany(Masalah::class);
    }

    public function tblsatoutput()
    {
        return $this->hasMany(Tblsatoutput::class,'satoutput','satoutput');
    }

    public function wilayah()
    {
        return $this->belongsToThrough(Wilayah::class,
        [Balai::class,Satker::class],
           null,
            '',
        [Paket::class => 'kdsatker'   
        ]); 
    }
}
