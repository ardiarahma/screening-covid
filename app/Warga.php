<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
  protected $table = 'wargas';
  protected $guarded = ['created_at'];
  public $timestamps = true;

  public function provinsi(){
    return $this->belongsTo('App\Models\Province', 'province_id', 'id');
  }
  public function kabupaten(){
    return $this->belongsTo('App\Models\Regency', 'regency_id', 'id');
  }
  public function kecamatan(){
    return $this->belongsTo('App\Models\District', 'district_id', 'id');
  }
  public function kelurahan(){
    return $this->belongsTo('App\Models\Village', 'village_id', 'id');
  }
  public function perantau(){
    return $this->belongsTo('App\Perantau', 'perantau_id', 'id');
  }
}
