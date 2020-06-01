<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanPsikisController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('psikis-pertanyaan.index');
  }

  public function getData(Request $request)
  {
      $data = Pertanyaan::whereIn('kategori',['Psikis'])->get();
      return datatables()->of($data)->addColumn('action', function($row){
          $btn = '<a href="'.route('psikis-pertanyaan.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
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
      return view('psikis-pertanyaan.create');
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
      ]
      );

      $array = array_values($request->all());
      for ($i=1; $i < sizeof($request->all()) ; $i++) {

          $pertanyaan = new Pertanyaan;
          $pertanyaan->kategori = 'Psikis';
          $pertanyaan->pertanyaan = $array[$i];
          $pertanyaan->save();
      }

      return redirect()->route('psikis-pertanyaan.index');
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
      return view('psikis-pertanyaan.edit',compact('data'));
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
          'pertanyaan' => 'required'
      ]
      );

      $pertanyaan = Pertanyaan::find($id);
      $pertanyaan->kategori = 'Psikis';
      $pertanyaan->pertanyaan = $request->pertanyaan;
      $pertanyaan->save();

      return redirect()->route('psikis-pertanyaan.index');
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
