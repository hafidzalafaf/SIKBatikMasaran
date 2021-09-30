<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        $data = Pemasukan::select('tanggal', Pemasukan::raw('SUM(nominal) as total_pemasukan'))->groupBy('tanggal')->get();
        // $load_tgl = Pemasukan::select('tanggal')->get();

        if($request->ajax()){
            return datatables()->of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="pemasukan/'.date('Y-m-d', strtotime($data->tanggal)).'" data-id="'.date('Y-m-d', strtotime($data->tanggal)).'" class="btn btn-sm btn-info">Detail</a>';                               
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);

        }
        // dd($jumlah);
        return view('pages.pemasukan.pemasukan', compact('title','sidebar','data'));
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
        
        // $conv = Carbon::createFromFormat('Y-m-d', $request->tanggal)->format('d/m/Y');
            
            $kirim = Pemasukan::create([
                'tanggal' => $request->tanggal,
                'motif' => $request->motif,
                'barang' => $request->barang,
                'ukuran' => $request->ukuran,
                'keterangan' => $request->keterangan,
                'jumlah' => $request->jumlah,
                'nominal' => $request->total_harga ?? '-',
            ]);

            return redirect()->route('pemasukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $tanggal)
    {

        $title= "Detail Pemasukan";
        $sidebar= "pemasukan";

        $where = array('tanggal' => $tanggal);
        $post  =  Pemasukan::where($where)->get();

        if($request->ajax()){
            return datatables()->of($post)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.$data->id.'/edit" data-id="'.$data->id.'" class="btn btn-sm btn-info">Edit</a>';                               
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-sm btn-danger" data-toggle="modal">Hapus</button>';
                        return $button;
                        
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);

        }        

        return view('pages.pemasukan.detail-pemasukan', compact('title','sidebar','post'));
        // dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title= "Form Edit Pemasukan";
        $sidebar= "pemasukan";

        $where = array('id' => $id);
        $post  = Pemasukan::where($where)->first();
     
        return view('pages.pemasukan.edit-pemasukan', compact('post','title','sidebar'));
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
            $kirim = Pemasukan::where($where)->first();
            
            $kirim->update([
                'tanggal' => $request->tanggal,
                'motif' => $request->motif,
                'barang' => $request->barang,
                'ukuran' => $request->ukuran,
                'keterangan' => $request->keterangan,
                'jumlah' => $request->jumlah,
                'nominal' => $request->total_harga ?? '-',           
            ]);

            
            return redirect()->route('pemasukan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pemasukan::where('id',$id)->delete();

        return response()->json($post);
    }

    public function all(Request $request)
    {
        $title= "Semua Pemasukan";
        $sidebar= "pemasukan";

        $post = Pemasukan::all();
        $conv_from = date('Y-m-d', strtotime($request->from_date));  
        $conv_to = date('Y-m-d', strtotime($request->to_date));

        if($request->ajax()){
            if(!empty($request->from_date)){
                $post = Pemasukan::whereBetween('tanggal', array($conv_from, $conv_to))->get();
            }
            else{
             $post = Pemasukan::get();
            }
            
            return datatables()->of($post)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.$data->id.'/edit" data-id="'.$data->id.'" class="btn btn-sm btn-info">Edit</a>';                               
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-sm btn-danger" data-toggle="modal">Hapus</button>';
                        return $button;
                        
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);

        }        
        return view('pages.pemasukan.all-pemasukan', compact('title','sidebar'));
    }
    
}
