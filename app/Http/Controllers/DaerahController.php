<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class DaerahController extends Controller
{
    public function getDataProvinsi(){
        $data = Province::all();
        $list = [];
        foreach ($data as $key => $value) {
            $list[] = [
                'id'=>$value->id,
                'text'=>$value->name
            ];
        }
        return response()->json($list);
    }

    public function getDataKabupaten(Request $request){
        $province = Province::where('id', $request->province_id)->first();
        $data = $province->regencies->sortBy('name');
        $list = [];
        foreach ($data as $key => $value) {
            $list[] = [
                'id'=>$value->id,
                'text'=>$value->name
            ];
        }
        return response()->json($list);
    }

    public function getDataKecamatan(Request $request){
      $regency = Regency::where('id', $request->regency_id)->first();
      $data = $regency->districts->sortBy('name');
      $list = [];
      foreach ($data as $key => $value) {
          $list[] = [
              'id'=>$value->id,
              'text'=>$value->name
          ];
      }
      return response()->json($list);
    }

    public function getDataKelurahan(Request $request){
      $district = District::where('id', $request->district_id)->first();
      $data = $district->villages->sortBy('name');
      $list = [];
      foreach ($data as $key => $value) {
          $list[] = [
              'id'=>$value->id,
              'text'=>$value->name
          ];
      }
      return response()->json($list);
    }

    public function getData($slug,$pid){
        switch ($slug) {
            case 'kabupaten':
                $data = Regency::where('province_id',$pid)->get();
                break;
            case 'kecamatan':
                $data = District::where('regency_id',$pid)->get();
                break;
            case 'kelurahan':
                $data = Village::where('district_id',$pid)->get();
                break;
        }
        return response()->json($data);
    }
}
