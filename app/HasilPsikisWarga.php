<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPsikisWarga extends Model
{
      protected $table = 'hasil_psikis_warga';


      public function warga(){
        return $this->belongsTo('App\Warga', 'warga_id', 'id');
      }
}
