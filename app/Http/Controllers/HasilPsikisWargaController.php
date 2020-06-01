<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilPsikisWarga;
use App\HasilSkor;
use Carbon\Carbon;

use App\Exports\SkalaKesehatanExport;
use Maatwebsite\Excel\Facades\Excel;
class HasilPsikisWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('hasil-psikis.index');
    }

    public function getData(Request $request)
    {
        $data = HasilPsikisWarga::with('warga')
                                ->whereHas('warga', function ($query) use ($request){
                                  if (!empty($request->rw)) {
                                    $query->whereIn('rw', [$request->rw]);
                                    if (!empty($request->rt)) {
                                      $query->whereIn('rt', [$request->rt]);
                                    }
                                  } elseif (!empty($request->rt)) {
                                    $query->whereIn('rt', [$request->rt]);
                                  }
                                })->get();
        return datatables()->of($data)->addColumn('action', function($row){
            $btn = '<button id="detail" class="btn border-warning btn-xs text-warning-600 btn-flat btn-icon"><i class="icon-eye"></i> Detail</button>';
            return $btn;
        })->addColumn('tanggal_pengisian', function($row){
          return Carbon::parse($row->created_at)->translatedFormat('j F Y');
        })
        ->rawColumns(['action','tanggal_pengisian'])
        ->addIndexColumn()
        ->make(true);
    }

    public function export(Request $request)
     {
           $rw = '';
           $rt = '';
          if ($request->rw) {
            $rw = $request->rw;
          }
          if ($request->rt) {
            $rt = $request->rt;
          }
         $data = HasilPsikisWarga::leftJoin('wargas', 'hasil_psikis_warga.warga_id', '=', 'wargas.id')
           ->when($rw, function ($query, $rw) {
               return $query->where('wargas.rw', $rw);
             })
           ->when($rt, function ($query, $rt) {
               return $query->where('wargas.rt', $rt);
             })
           ->select('hasil_psikis_warga.created_at', 'wargas.nama','wargas.no_telepon','wargas.jenis_kelamin','wargas.tanggal_lahir','wargas.rw','wargas.rt','hasil_psikis_warga.hasil_skors')
           ->orderBy('wargas.nama')->get();
         if ($rw) {
           if ($rt) {
             return Excel::download(new SkalaKesehatanExport($data,$rw,$rt), 'Rekap Skala Kesehatan RW '.$rw.' RT '.$rt.'.xlsx');
           }
           return Excel::download(new SkalaKesehatanExport($data,$rw,$rt), 'Rekap Skala Kesehatan RW '.$rw.'.xlsx');
         } else {
           if ($rt) {
             return Excel::download(new SkalaKesehatanExport($data,$rw,$rt), 'Rekap Skala Kesehatan RT '.$rt.'.xlsx');
           }
           return Excel::download(new SkalaKesehatanExport($data,$rw,$rt), 'Rekap Skala Kesehatan Kadipaten.xlsx');
         }
     }
}
