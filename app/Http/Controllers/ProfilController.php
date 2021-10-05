<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title= "Profil";
        $sidebar= "";

        $user = \Auth::user();
        // $profil = User::with('roles')->where($user)->get();
        // dd($user);
        return view('pages.profil', compact('title','sidebar','user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title= "Edit Profil";
        $sidebar= "";
        $user = \Auth::user();

        $where = array('id' => $id);
        $post  = User::with('roles')->where($where)->first();
     
        // dd($post);
        return view('pages.edit-profil', compact('post','title','sidebar','user'));
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
            $where = array('id' => $id);
            $kirim = User::where($where)->first();
            
            $kirim->update([
                'name' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->telepon,
                'nama_toko' => $request->nama_toko,
                'jabatan' => $request->jabatan,       
            ]);

            
            return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
