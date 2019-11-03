<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{

    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    protected $table = 'wilayah';

    public function balai()
    {
        return $this->hasMany(Balai::class);
    }

    public function satker()
    {
        return $this->hasManyThrough(Satker::class, Balai::class);
    }
    public function paket()
    {
        return $this->hasManyDeep(Paket::class,
        [Balai::class,Satker::class],
        [
            'wilayah_id',
            'balai_id',
            'kdsatker'
        ],
        [
         'id',
         'id',
         'kdsatker'   
        ]); 
    }
}
