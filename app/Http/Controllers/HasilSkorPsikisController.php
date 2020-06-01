<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilSkor;

class HasilSkorPsikisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('psikis-skor.index');
    }

    public function getData(Request $request)
    {
        $data = HasilSkor::where('kategori_screening','Psikis')->get();
        return datatables()->of($data)->addColumn('action', function($row){
            $btn = '<a href="'.route('psikis-skor.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
            $btn = $btn.'  <button id="delete" class="btn border-warning btn-xs text-warning-600 btn-flat btn-icon"><i class="icon-trash"></i></button>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('psikis-skor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'kategori_hasil' => 'required',
            'tingkat_skor' => 'required',
            'nilai_batas_bawah' => 'required|lt:nilai_batas_atas',
            'nilai_batas_atas' => 'required|gt:nilai_batas_bawah'
        ]
        );

        $skor = new HasilSkor();
        $skor->kategori_screening = 'Psikis';
        $skor->kategori_hasil = $request->kategori_hasil;
        $skor->hasil = $request->tingkat_skor;
        $skor->interpretasi = $request->interpretasi;
        $skor->tatalaksana = $request->tatalaksana;
        $skor->batas_bawah = $request->nilai_batas_bawah;
        $skor->batas_atas = $request->nilai_batas_atas;
        $skor->save();

        return redirect()->route('psikis-skor.index');
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
    public function edit($id)
    {
        $data = HasilSkor::find($id);
        return view('psikis-skor.edit',compact('data'));
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
            'kategori_hasil' => 'required',
            'tingkat_skor' => 'required',
            'nilai_batas_bawah' => 'required|lt:nilai_batas_atas',
            'nilai_batas_atas' => 'required|gt:nilai_batas_bawah'
        ]
        );

        $skor = HasilSkor::find($id);
        $skor->kategori_screening = 'Psikis';
        $skor->kategori_hasil = $request->kategori_hasil;
        $skor->hasil = $request->tingkat_skor;
        $skor->interpretasi = $request->interpretasi;
        $skor->tatalaksana = $request->tatalaksana;
        $skor->batas_bawah = $request->nilai_batas_bawah;
        $skor->batas_atas = $request->nilai_batas_atas;
        $skor->save();

        return redirect()->route('psikis-skor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skor = HasilSkor::find($id);
        $skor->delete();
        return response()->json(['data'=>'success delete data']);
    }
}
