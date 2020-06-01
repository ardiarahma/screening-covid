<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanWarga extends Model
{
  protected $table = 'jawabanwargas';
  protected $guarded = ['created_at','updated_at'];
  public $timestamps = true;

  public function pertanyaan(){
    return $this->belongsTo('App\Pertanyaan', 'pertanyaan_id', 'id');
  }
}
