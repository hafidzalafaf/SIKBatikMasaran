<?php

namespace App\Http\Controllers;

use App\Pemasukan;

use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title= "Rangkuman Pemasukan";
        $sidebar= "pemasukan";

        $pemasukan = Pemasukan::get();
        if($request->ajax()){
            return datatables()->of($pemasukan)
                    ->addColumn('action', function($data){
                        $button = '<a href="/pemasukan/detail" data-id="'.$data->id.'" class="btn btn-sm btn-info">Detail</a>';                               
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);

        }
        // dd($pemasukan);
        return view('pages.pemasukan.pemasukan', compact('title','sidebar','pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title= "Form Tambah Pemasukan";
        $sidebar= "pemasukan";

        return view('pages.pemasukan.tambah-pemasukan', compact('title','sidebar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $this->validate($request, [
                    // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],$messages);
        
            $kirim = Pemasukan::create([
                'tanggal' => $request->tanggal,
                'motif' => $request->motif,
                'barang' => $request->barang,
                'ukuran' => $request->ukuran,
                'keterangan' => $request->keterangan,
                // 'nama' => $request->jenis_penjualan,
                'jumlah' => $request->jumlah,
                'nominal' => $request->total_harga,
            ]);
        
            // return dd($kirim);
            return redirect()->route('pemasukan.index');
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
        //
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
        //
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

    public function all(Request $request)
    {
        $title= "Semua Pemasukan";
        $sidebar= "pemasukan";

        return view('pages.pemasukan.all-pemasukan', compact('title','sidebar'));
    }
}
