<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Datatables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getData(Request $request)
    {
        $data = User::all();
        return datatables()->of($data)->addColumn('action', function($row){
            $btn = '<a href="'.route('user.edit',$row->id).'" class="btn border-info btn-xs text-info-600 btn-flat btn-icon"><i class="icon-pencil6"></i></a>';
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
        $role = Role::orderBy('id', 'desc')->get();
        return view('user.create', compact('role'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->role);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('user.profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $role = Role::all();
        return view('user.edit',compact('data','role'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'confirmed',
            'role' => 'required',
        ]
        );

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
        $user->password = \Hash::make($request->password);
        }
        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['data'=>'success delete data']);
    }

    public function updateProfil(Request $request, $id)
    {
        $this->validate(request(),
        [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]
        );

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.show',$id);
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate(request(),
        [
            'password' => 'confirmed'
        ]
        );

        $user = User::find($id);
        if ($request->password) {
        $user->password = \Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.show',$id);
    }
}
