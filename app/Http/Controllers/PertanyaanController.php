<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('covid-pertanyaan.index');
    }

    public function getData(Request $request)
    {
        $data = Pertanyaan::whereIn('kategori',['Riwayat Kesehatan','Riwayat Perjalanan','Riwayat Penyakit',''])->get();
        return datatables()->of($data)->addColumn('action', function($row){
            $btn = '<a href="'.route('covid-pertanyaan.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
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
        return view('covid-pertanyaan.create');
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
            'kategori' => 'required'
        ]
        );

        $array = array_values($request->all());
        for ($i=2; $i < sizeof($request->all()) ; $i++) {

            $pertanyaan = new Pertanyaan;
            $pertanyaan->kategori = $request->kategori;
            $pertanyaan->pertanyaan = $array[$i];
            $pertanyaan->save();
        }

        return redirect()->route('covid-pertanyaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pertanyaan::find($id);
        return view('covid-pertanyaan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),
        [
            'kategori' => 'required',
            'pertanyaan' => 'required'
        ]
        );

        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->kategori = $request->kategori;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();

        return redirect()->route('covid-pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id)->delete();
        return response()->json(['data'=>'success delete data']);
    }
}
