<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use App\Pertanyaan;
use App\Models\Province;
use App\JawabanWarga;
use App\Perantau;
use App\HasilSkor;
use App\HasilSkriningWarga;
use App\HasilPsikisWarga;
use Carbon\Carbon;
use DB;
use App\Gambar;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $gambar = Gambar::orderByDesc('created_at')->take(4)->get();
        return view('warga.login',compact('gambar'));
    }

    public function index($telepon)
    {
        $warga = Warga::where('no_telepon',$telepon)->first();
        return view('warga.list', compact('warga'));
    }

    public function getData(Request $request)
    {
        $warga = Warga::where('no_telepon',$request->no_telepon)->first();
        $data = Warga::where('created_by',$warga->created_by)->get();
        return datatables()->of($data)->addColumn('action', function($row){
          if ($row->id == $row->created_by) {
            $btn = '<a href="'.route('warga.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
          } else {
            $btn = '<a href="'.route('warga.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
            $btn = $btn.'  <button id="delete" class="btn border-warning btn-xs text-warning-600 btn-flat btn-icon"><i class="icon-trash"></i></button>';
          }
            return $btn;
        })
        ->addColumn('screening', function($row){
          if ($row->id == $row->created_by) {
            $btn = '<a href="'.route('warga.lapor',$row->id).'" class="btn border-success btn-xs text-success-600 btn-flat btn-icon"><i class="icon-pencil5"></i> Skrining COVID-19</a>';
            $btn = $btn.'  <a href="'.route('warga.screPsi',$row->id).'" class="btn border-success btn-xs text-success-600 btn-flat btn-icon"><i class="icon-pencil5"></i> Cek Skala Kesehatan</a>';
          } else {
            $btn = '<a href="'.route('warga.lapor',$row->id).'" class="btn border-success btn-xs text-success-600 btn-flat btn-icon"><i class="icon-pencil5"></i> Skrining COVID-19</a>';
            $btn = $btn.'  <a href="'.route('warga.screPsi',$row->id).'" class="btn border-success btn-xs text-success-600 btn-flat btn-icon"><i class="icon-pencil5"></i> Cek Skala Kesehatan</a>';
          }
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action','screening'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($telepon)
    {
      $provinsi = Province::all();
      $warga = Warga::where('no_telepon',$telepon)->first();
      return view('warga.create', compact('warga','provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate(request(),
        ['no_telepon' => 'required|between:10,13']);

        $warga = Warga::where('no_telepon',$request->no_telepon)->first();;
        if (!empty($warga)) {
          if (!empty($warga->nik)) {
            return redirect('/list/'.$warga->no_telepon);
          } else {
            return view('warga.isi-data', compact('warga'));
          }
        } else {
          $warga = Warga::create([
            'no_telepon' => request('no_telepon')
          ]);
          $warga->created_by = $warga->id;
          $warga->save();

          return redirect()->route('warga.isiData',$warga->no_telepon);
        }
    }

    public function store(Request $request, $telepon)
    {
        DB::beginTransaction();
        $pendaftar = Warga::where('no_telepon',$telepon)->first();
        $this->validate(request(),
        [
            'nomor_telepon' => 'required|between:10,12',
            'nik' => 'required|digits:16',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kota_kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'status_kependudukan' => 'required',
        ]);
        $warga = new Warga();
        $warga->no_telepon = $request->nomor_telepon;
        $warga->nama = $request->nama;
        $warga->nik = $request->nik;
        $warga->tanggal_lahir = Carbon::parse($request->tanggal_lahir);
        $warga->jenis_kelamin = $request->jenis_kelamin;
        $warga->province_id = $request->provinsi;
        $warga->regency_id = $request->kota_kabupaten;
        $warga->district_id = $request->kecamatan;
        $warga->village_id = $request->kelurahan;
        $warga->rw = $request->rw;
        $warga->rt = $request->rt;
        $warga->created_by = $pendaftar->created_by;
        $warga->status_kependudukan = $request->status_kependudukan;
        $warga->save();

        if ($warga->status_kependudukan == 'Perantau') {
          $this->validate(request(),
          [
              'tanggal_pulang' => 'required',
              'provinsi_rantau' => 'required',
              'kota_kabupaten_rantau' => 'required',
              'kecamatan_rantau' => 'required',
              'kelurahan_rantau' => 'required',
          ]);
          $perantau = new Perantau();
          $perantau->tanggal_pulang = Carbon::parse($request->tanggal_pulang);
          $perantau->province_id = $request->provinsi_rantau;
          $perantau->regency_id = $request->kota_kabupaten_rantau;
          $perantau->district_id = $request->kecamatan_rantau;
          $perantau->village_id = $request->kelurahan_rantau;
          $perantau->save();
          $warga->perantau_id = $perantau->id;
          $warga->save();
        }
        DB::commit();
        return redirect('/list/'.$telepon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function isiData($telepon)
    {
      $warga = Warga::where('no_telepon',$telepon)->first();
      $provinsi = Province::all();
      if (!empty($warga->nik)) {
        return redirect('/list/'.$warga->no_telepon);
      } else {
        return view('warga.isi-data', compact('warga','provinsi'));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate(request(),
      [
          'nama' => 'required',
          'nik' => 'required|digits:16',
          'tanggal_lahir' => 'required',
          'jenis_kelamin' => 'required',
          'provinsi' => 'required',
          'kota_kabupaten' => 'required',
          'kecamatan' => 'required',
          'kelurahan' => 'required',
          'rw' => 'required',
          'rt' => 'required',
          'status_kependudukan' => 'required',
      ]
      );
      DB::beginTransaction();
      $warga = Warga::where('no_telepon',$id)->first();
      $warga->nama = $request->nama;
      $warga->nik = $request->nik;
      $warga->tanggal_lahir = Carbon::parse($request->tanggal_lahir);
      $warga->jenis_kelamin = $request->jenis_kelamin;
      $warga->province_id = $request->provinsi;
      $warga->regency_id = $request->kota_kabupaten;
      $warga->district_id = $request->kecamatan;
      $warga->village_id = $request->kelurahan;
      $warga->rw = $request->rw;
      $warga->rt = $request->rt;
      $warga->status_kependudukan = $request->status_kependudukan;
      $warga->save();
      if ($warga->status_kependudukan == 'Perantau') {
          $this->validate(request(),
          [
              'tanggal_pulang' => 'required',
              'provinsi_rantau' => 'required',
              'kota_kabupaten_rantau' => 'required',
              'kecamatan_rantau' => 'required',
              'kelurahan_rantau' => 'required',
          ]
          );
          $perantau = new Perantau();
          $perantau->tanggal_pulang = Carbon::parse($request->tanggal_pulang);
          $perantau->province_id = $request->provinsi_rantau;
          $perantau->regency_id = $request->kota_kabupaten_rantau;
          $perantau->district_id = $request->kecamatan_rantau;
          $perantau->village_id = $request->kelurahan_rantau;
          $perantau->save();
          $warga->perantau_id = $perantau->id;
          $warga->save();
      }
      DB::commit();
      return redirect('/list/'.$warga->no_telepon);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $warga = Warga::find($id)->delete();
         return response()->json(['data'=>'success delete data']);
     }

     public function lapor($id)
     {
         $warga = Warga::find($id);
         $jawabanToday = JawabanWarga::where('warga_id',$id)
                                ->whereNull('uniq_pengisian')
                                ->whereDate('created_at', Carbon::today())
                                ->first();
         if (!empty($jawabanToday)) {
            return redirect('laporan/detail/'.$warga->id);
         }
         if ($warga->created_by) {
            $trigTel = Warga::find($warga->created_by)->no_telepon;
         } else {
            $trigTel = $warga->no_telepon;
         }
         $pertanyaan = Pertanyaan::whereNotIn('kategori',['Psikis'])->get()->sortBy('id');
         return view('warga.lapor', compact('warga','pertanyaan','trigTel'));
     }

     public function laporStore(Request $request, $id)
     {
        $warga = Warga::find($id);
        $array = array_values($request->all());

        switch ($array) {
          case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
            $kode = 'otg';
            break;
          case ($array[2][0] == 'ya' && ($array[2][1] == 'ya' || $array[2][2] == 'ya' || $array[2][3] == 'ya' || $array[2][4] == 'ya' || $array[2][8] != NULL) && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak'):
            $kode = 'otg';
            break;
          case (($array[2][0] == 'ya' || $array[2][1] == 'ya' || $array[2][2] == 'ya') && ($array[2][5] == 'ya' || $array[2][6] == 'ya') && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
            $kode = 'odp';
            break;
          case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'ya' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
            $kode = 'odp';
            break;
          case ($array[2][0] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'ya' && $array[2][6] == 'ya' && $array[2][7] == 'ya' && $array[2][8] == NULL && ($array[2][1] == 'ya' || $array[2][2] == 'ya')):
            $kode = 'pdp';
            break;
          case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][6] == 'tidak' && $array[2][8] == NULL && ($array[2][5] == 'ya' || $array[2][7] == 'ya')):
            $kode = 'pdp';
            break;
          case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'ya' && $array[2][8] == NULL):
            $kode = 'pdp';
            break;
          case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] != NULL):
            $kode = 'imun';
            break;
          case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] != NULL && ($array[2][3] == 'ya' || $array[2][4] == 'ya')):
            $kode = 'imun';
            break;
          case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
            $kode = 'sehat';
            break;
          case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL && ($array[2][3] == 'ya' || $array[2][4] == 'ya')):
            $kode = 'sehat';
            break;
          default:
            $kode = 'belum_diketahui';
            break;
        }

         $hasil = HasilSkor::where('kategori_hasil',$kode)->first();
         $hasil_skrining_warga = new HasilSkriningWarga;
         $hasil_skrining_warga->warga_id = $id;
         $hasil_skrining_warga->hasil_skors_id = $hasil->id;
         $hasil_skrining_warga->save();

         for ($i=0; $i < sizeof($array[1]) ; $i++) {
             $jawaban = new JawabanWarga;
             $jawaban->hasil_skrining_warga = $hasil_skrining_warga->id;
             $jawaban->warga_id = $warga->id;
             $jawaban->pertanyaan_id = $array[1][$i];
             if ($array[2][$i] == NULL) {
              $jawaban->jawaban = 'tidak ada';
             } else {
              $jawaban->jawaban = $array[2][$i];
             }
             $pertanyaan = Pertanyaan::find($array[1][0]);
             if ($array[2][$i] == 'ya' || ($array[2][$i] != NULL && $array[2][$i] != 'tidak')) {
               $jawaban->skor = $pertanyaan->skor_ya;
             } else {
               $jawaban->skor = $pertanyaan->skor_tidak;
             }
             $jawaban->save();
         }
         return redirect('laporan/detail/'.$warga->id);
     }

     public function laporDetail($id)
     {
         $warga = Warga::find($id);
        //  $skor = JawabanWarga::where('warga_id',$id)
        //                                ->whereDate('created_at', Carbon::today())
        //                                ->select([DB::raw('sum(skor) as skor'),DB::raw('DATE(created_at) as day')])
        //                                ->groupBy('day')
        //                                ->first();
        //  $hasil = HasilSkor::where('batas_bawah','<=',$skor->skor)
        //                     ->where('batas_atas','>=',$skor->skor)
        //                     ->first();
        //  if (!$hasil) {
        //    $hasil = '(*terjadi kesalahan*)';
        //  } else {
        //    $hasil = $hasil->hasil;
        //  }
         $hasil = HasilSkriningWarga::where('warga_id',$id)->latest()->first();
         $gambar= asset('images/emoticon/'.$hasil->hasil_skors()->first()->gambar.'');
         return view('warga.lapor-detail', compact('warga','hasil','gambar'));
     }

     public function laporEdit($id)
     {
         $warga = Warga::find($id);
         $pertanyaan = Pertanyaan::whereNotIn('kategori',['Psikis'])->get()->sortBy('id');
         $jawaban = JawabanWarga::where('warga_id',$id)->whereDate('created_at', Carbon::today())->get()->sortBy('pertanyaan_id');
         // dd($jawaban,$pertanyaan);
         return view('warga.lapor-edit', compact('warga','pertanyaan','jawaban'));
     }

     public function laporUpdate(Request $request, $id)
     {
         $warga = Warga::find($id);
         $array = array_values($request->all());
         for ($i=0; $i < sizeof($array[1]) ; $i++) {
             $jawaban = JawabanWarga::where('pertanyaan_id',$array[1][$i])->whereDate('created_at', Carbon::today())->get()->sortBy('pertanyaan_id')->first();
             $jawaban->pertanyaan_id = $array[1][$i];
             $jawaban->jawaban = $array[2][$i];
             $pertanyaan = Pertanyaan::find($array[1][0]);
             if ($array[2][$i] == 'ya') {
               $jawaban->skor = $pertanyaan->skor_ya;
             } else {
               $jawaban->skor = $pertanyaan->skor_tidak;
             }
             $jawaban->save();
         }
         return redirect('laporan/detail/'.$warga->id);
     }

     public function edit($id)
     {
         $provinsi = Province::all();
         $warga = Warga::find($id);
         if ($warga->created_by) {
            $trigTel = Warga::find($warga->created_by)->no_telepon;
         } else {
            $trigTel = $warga->no_telepon;
         }
         return view('warga.edit', compact('warga','trigTel','provinsi'));
     }
     public function updateWarga(Request $request, $id)
     {

       DB::beginTransaction();
       $warga = Warga::find($id);
       if ($request->status_kependudukan == 'Perantau') { // Kalau milih perantau
         $this->validate(request(),
         [
             'nomor_telepon' => 'required|between:10,12',
             'nik' => 'required|digits:16',
             'nama' => 'required',
             'tanggal_lahir' => 'required',
             'jenis_kelamin' => 'required',
             'provinsi' => 'required',
             'kota_kabupaten' => 'required',
             'kecamatan' => 'required',
             'kelurahan' => 'required',
             'status_kependudukan' => 'required',
             'provinsi_rantau' => 'required',
             'kota_kabupaten_rantau' => 'required',
             'kecamatan_rantau' => 'required',
             'kelurahan_rantau' => 'required',
         ]
         );
         if (!empty($warga->perantau_id)) { // kalau data sebelumnya adalah perantau,  update data rantau
           $perantau = Perantau::find($warga->perantau_id);
           $perantau->tanggal_pulang = $request->tanggal_pulang;
           $perantau->province_id = $request->provinsi_rantau;
           $perantau->regency_id = $request->kota_kabupaten_rantau;
           $perantau->district_id = $request->kecamatan_rantau;
           $perantau->village_id = $request->kelurahan_rantau;
           $perantau->save();
           $warga->perantau_id = $perantau->id;
           $warga->save();
         } else { // kalau data sebelumnya bukan perantau, buat data rantau
           $perantau = new Perantau();
           $perantau->tanggal_pulang = $request->tanggal_pulang;
           $perantau->province_id = $request->provinsi_rantau;
           $perantau->regency_id = $request->kota_kabupaten_rantau;
           $perantau->district_id = $request->kecamatan_rantau;
           $perantau->village_id = $request->kelurahan_rantau;
           $perantau->save();
           $warga->perantau_id = $perantau->id;
           $warga->save();
         }
       } else { // kalau milih bukan perantau
         $this->validate(request(),
         [
             'nomor_telepon' => 'required|between:10,12',
             'nik' => 'required|digits:16',
             'nama' => 'required',
             'tanggal_lahir' => 'required',
             'jenis_kelamin' => 'required',
             'provinsi' => 'required',
             'kota_kabupaten' => 'required',
             'kecamatan' => 'required',
             'kelurahan' => 'required',
             'status_kependudukan' => 'required',
         ]
         );
         if (!empty($warga->perantau_id)) { // kalau data sebelumnya adalah perantau, data rantau dihapus
           $perantau = Perantau::find($warga->perantau_id)->delete();
           $warga->perantau_id = null;
           $warga->save();
         }
       }
       $warga->no_telepon = $request->nomor_telepon;
       $warga->nik = $request->nik;
       $warga->tanggal_lahir = Carbon::parse($request->tanggal_lahir);
       $warga->nama = $request->nama;
       $warga->jenis_kelamin = $request->jenis_kelamin;
       $warga->province_id = $request->provinsi;
       $warga->regency_id = $request->kota_kabupaten;
       $warga->district_id = $request->kecamatan;
       $warga->village_id = $request->kelurahan;
       $warga->status_kependudukan = $request->status_kependudukan;
       $warga->save();
       DB::commit();
       if (!empty($warga->created_by)) {
          $trigTel = Warga::find($warga->created_by)->no_telepon;
          return redirect('/list/'.$trigTel);
       } else {
          return redirect('/list/'.$warga->no_telepon);
       }
     }

     public function chart($id)
      {
        $chart = JawabanWarga::where('warga_id',$id)
                              ->leftJoin('wargas','jawabanwargas.warga_id','=','wargas.id')
                              ->select([DB::raw('sum(skor) as skor'),DB::raw('DATE(jawabanwargas.created_at) as day'),DB::raw('wargas.nama')])
                              ->groupBy('day', 'wargas.nama')
                              ->get();
        $result = [];
        $result[] = $chart[0]->nama;
        foreach ($chart as $key => $value) {
            $result[$key+1] = $value->skor;
        }
        $result = [array_values($result)];
        foreach ($result as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if ($key1 == 0) {
                    $number[] = "x";
                } else {
                    $number[] = $key1;
                }
            }
        }
        $number = array_combine($number,$number);
        $number = array_values($number);
        array_unshift($result , $number);
        return response()->json($result);
      }

      public function screeningPsikis($id)
      {
          $warga = Warga::find($id);
          if ($warga->created_by) {
             $trigTel = Warga::find($warga->created_by)->no_telepon;
          } else {
             $trigTel = $warga->no_telepon;
          }
          $pertanyaan = Pertanyaan::where('kategori','Psikis')->get()->sortBy('id');
          return view('warga.screening-psikis', compact('warga','pertanyaan','trigTel'));
      }

      public function screeningPsikisStore(Request $request, $id)
      {
          $warga = Warga::find($id);
          $pertanyaan = Pertanyaan::where('kategori','Psikis')->get()->sortBy('id');
          $uniq_pengisian = rand(1000000,9999999);

          $array = array_values($request->all());
          for ($i=0; $i < sizeof($array[1]) ; $i++) {
              $jawaban = new JawabanWarga;
              $jawaban->uniq_pengisian = $uniq_pengisian;
              $jawaban->warga_id = $id;
              $jawaban->pertanyaan_id = $array[1][$i];
              $jawaban->jawaban = "Ya";
              $jawaban->skor = $array[2][$i];
              $jawaban->save();
          }
          $skor = JawabanWarga::where('uniq_pengisian',$uniq_pengisian)
                                ->select([DB::raw('sum(skor) as skor'),DB::raw('uniq_pengisian')])
                                ->groupBy('uniq_pengisian')
                                ->first();
          $hasil_psikis = new HasilPsikisWarga;
          $hasil_psikis->uniq_pengisian = $uniq_pengisian;
          $hasil_psikis->warga_id = $id;
          $hasil_psikis->hasil_skors = $skor->skor;
          $hasil_psikis->save();
          DB::commit();

          return redirect('screening-kesehatan/hasil/'.$uniq_pengisian);
      }

      public function screeningPsikisHasil($id)
      {
          $skor = HasilPsikisWarga::where('uniq_pengisian',$id)
                                ->first()->hasil_skors;
          $hasil = HasilSkor::where('batas_bawah','<=',$skor)
                             ->where('batas_atas','>=',$skor)
                             ->where('kategori_screening','Psikis')
                             ->get();
          $warga = Warga::find(JawabanWarga::where('uniq_pengisian',$id)->first()->warga_id);
          if (!$hasil) {
            $hasil = '(*terjadi kesalahan*)';
          }
          return view('warga.screening-psikis-hasil', compact('warga','hasil'));
      }

      public function deteksiDini()
      {
          $pertanyaan = Pertanyaan::whereNotIn('kategori',['Psikis'])->get()->sortBy('id');
          return view('warga.deteksi-dini', compact('pertanyaan'));
      }

      public function deteksiDiniStore(Request $request)
      {
          $array = array_values($request->all());
          switch ($array) {
            case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
              $kode = 'otg';
              break;
            case ($array[2][0] == 'ya' && ($array[2][1] == 'ya' || $array[2][2] == 'ya' || $array[2][3] == 'ya' || $array[2][4] == 'ya' || $array[2][8] != NULL) && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak'):
              $kode = 'otg';
              break;
            case (($array[2][0] == 'ya' || $array[2][1] == 'ya' || $array[2][2] == 'ya') && ($array[2][5] == 'ya' || $array[2][6] == 'ya') && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
              $kode = 'odp';
              break;
            case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'ya' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
              $kode = 'odp';
              break;
            case ($array[2][0] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'ya' && $array[2][6] == 'ya' && $array[2][7] == 'ya' && $array[2][8] == NULL && ($array[2][1] == 'ya' || $array[2][2] == 'ya')):
              $kode = 'pdp';
              break;
            case ($array[2][0] == 'ya' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][6] == 'tidak' && $array[2][8] == NULL && ($array[2][5] == 'ya' || $array[2][7] == 'ya')):
              $kode = 'pdp';
              break;
            case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'ya' && $array[2][8] == NULL):
              $kode = 'pdp';
              break;
            case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] != NULL):
              $kode = 'imun';
              break;
            case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] != NULL && ($array[2][3] == 'ya' || $array[2][4] == 'ya')):
              $kode = 'imun';
              break;
            case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][3] == 'tidak' && $array[2][4] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL):
              $kode = 'sehat';
              break;
            case ($array[2][0] == 'tidak' && $array[2][1] == 'tidak' && $array[2][2] == 'tidak' && $array[2][5] == 'tidak' && $array[2][6] == 'tidak' && $array[2][7] == 'tidak' && $array[2][8] == NULL && ($array[2][3] == 'ya' || $array[2][4] == 'ya')):
              $kode = 'sehat';
              break;
            default:
              $kode = 'belum_diketahui';
              break;
          }

          $hasil = HasilSkor::where('kategori_hasil',$kode)->first();
          $gambar= asset('images/emoticon/'.$hasil->gambar.'');
          return view('warga.deteksi-dini-hasil', compact('hasil','gambar'));
      }


}
