<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PengeluaranController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title= "Rangkuman Pengeluaran";
        $sidebar= "pengeluaran";
        $user = \Auth::user();

        $data = Pengeluaran::select('tanggal', Pengeluaran::raw('SUM(konsumsi+ab+transportasi) as total_pengeluaran'))->groupBy('tanggal')->get();
        // $data = Pengeluaran::get();
        if($request->ajax()){
            return datatables()->of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="pengeluaran/'.date('Y-m-d', strtotime($data->tanggal)).'" data-id="'.date('Y-m-d', strtotime($data->tanggal)).'" class="btn btn-sm btn-info">Detail</a>';                               
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);

        }
        // dd($data);
        return view('pages.pengeluaran.pengeluaran', compact('title','sidebar','data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title= "Tambah Pengeluaran";
        $sidebar= "pengeluaran";
        $user = \Auth::user();

        return view('pages.pengeluaran.tambah', compact('title','sidebar','user'));
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
                    
            $kirim = Pengeluaran::create([
                'tanggal' => $request->tanggal,
                'instansi' => $request->nama_instansi,
                'ab' => $request->ab ?? '-',
                'konsumsi' => $request->konsumsi ?? '-',
                'transportasi' => $request->transportasi ?? '-',
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $tanggal)
    {
        $title= "Detail Pengeluaran";
        $sidebar= "pengeluaran";
        $user = \Auth::user();

        $where = array('tanggal' => $tanggal);
        $post  =  Pengeluaran::where($where)->get();

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

        return view('pages.pengeluaran.detail', compact('title','sidebar','post','user'));
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
        $title= "Edit Pengeluaran";
        $sidebar= "pengeluaran";
        $user = \Auth::user();

        $where = array('id' => $id);
        $post  = Pengeluaran::where($where)->first();
     
        return view('pages.pengeluaran.edit', compact('post','title','sidebar','user'));
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
            $kirim = Pengeluaran::where($where)->first();
            
            $kirim->update([
                'tanggal' => $request->tanggal,
                'instansi' => $request->nama_instansi,
                'ab' => $request->ab ?? '-',
                'konsumsi' => $request->konsumsi ?? '-',
                'transportasi' => $request->transportasi ?? '-',
                'keterangan' => $request->keterangan,           
            ]);

            
            return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pengeluaran::where('id',$id)->delete();

        return response()->json($post);
    }

    public function all(Request $request)
    {
        $title= "Semua Laporan Pengeluaran";
        $sidebar= "pengeluaran";
        $user = \Auth::user();

        $post = Pengeluaran::all();
        $conv_from = date('Y-m-d', strtotime($request->from_date));  
        $conv_to = date('Y-m-d', strtotime($request->to_date));

        if($request->ajax()){
            if(!empty($request->from_date)){
                $post = Pengeluaran::whereBetween('tanggal', array($conv_from, $conv_to))->get();
            }
            else{
             $post = Pengeluaran::get();
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
        return view('pages.pengeluaran.all', compact('title','sidebar','user'));
    }
}
