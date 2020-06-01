<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilSkriningWarga extends Model
{
    protected $table = 'hasil_skrining_warga';

    public function hasil_skors(){
        return $this->belongsTo('App\HasilSkor', 'hasil_skors_id', 'id');
    }
}
