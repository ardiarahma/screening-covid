<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warga;
use DB;

use App\Exports\PerserbaranPemudikExport;
use Maatwebsite\Excel\Facades\Excel;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function getData(Request $request)
    {
        $rw = $request->rw;
        $rt = $request->rt;
        $data = Warga::when($rw, function ($query, $rw) {
                          return $query->where('rw', $rw);
                        })
                      ->when($rt, function ($query, $rt) {
                          return $query->where('rt', $rt);
                        })
                       ->whereNotNull('perantau_id')
                       ->select(DB::raw('count(rt) as jumlah, rw, rt'))
                       ->groupBy('rw','rt')
                       ->orderBy('rt')
                       ->get();
        return datatables()->of($data)
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
          $data = Warga::when($rw, function ($query, $rw) {
                            return $query->where('rw', $rw);
                          })
                        ->when($rt, function ($query, $rt) {
                            return $query->where('rt', $rt);
                          })
                         ->whereNotNull('perantau_id')
                         ->select(DB::raw('rw, rt, count(rt) as jumlah'))
                         ->groupBy('rw','rt')
                         ->orderBy('rt')
                         ->get();
         if ($rw) {
           if ($rt) {
             return Excel::download(new PerserbaranPemudikExport($data,$rw,$rt), 'Persebaran Pemudik RT '.$rt.' RW '.$rw.'.xlsx');
           }
           return Excel::download(new PerserbaranPemudikExport($data,$rw,$rt), 'Persebaran Pemudik RW '.$rw.'.xlsx');
         } else {
           if ($rt) {
             return Excel::download(new PerserbaranPemudikExport($data,$rw,$rt), 'Persebaran Pemudik RT '.$rt.'.xlsx');
           }
           return Excel::download(new PerserbaranPemudikExport($data,$rw,$rt), 'Persebaran Pemudik Kadipaten.xlsx');
         }
     }
}
