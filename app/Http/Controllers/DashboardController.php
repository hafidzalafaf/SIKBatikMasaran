<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;
use App\Pengeluaran;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Dashboard";
        $sidebar= "dashboard";

        $pemasukan_now = Pemasukan::select('tanggal', Pemasukan::raw('SUM(nominal) as total_pemasukan'))->groupBy('tanggal')->whereDate('tanggal', Carbon::now()->setTimezone('Asia/Jakarta'))->get();
        if ($pemasukan_now->isEmpty()) {
            $pemasukan_now = '0';
         } 
        
        $pengeluaran_now = Pengeluaran::select('tanggal', Pengeluaran::raw('SUM(konsumsi+ab+transportasi) as total_pengeluaran'))->groupBy('tanggal')->whereDate('tanggal', Carbon::now()->setTimezone('Asia/Jakarta'))->get();
        if ($pengeluaran_now->isEmpty()) {
            $pengeluaran_now = '0';
         }
         
        $pemasukan_mingguan = Pemasukan::select('tanggal', Pemasukan::raw('SUM(nominal) as total_pemasukan'))->groupBy('tanggal')->whereBetween('tanggal', [Carbon::now()->setTimezone('Asia/Jakarta')->startOfWeek(), Carbon::now()->setTimezone('Asia/Jakarta')->endOfWeek()])->get();
        if ($pemasukan_mingguan->isEmpty()) {
             $pemasukan_mingguan = '0';
        }else{
            $object = json_decode(json_encode($pemasukan_mingguan), FALSE);
            $arr_new = array_sum(array_column($object, 'total_pemasukan'));
            $pemasukan_mingguan = $arr_new;
        }

        $pengeluaran_mingguan = Pengeluaran::select('tanggal', Pengeluaran::raw('SUM(konsumsi+ab+transportasi) as total_pengeluaran'))->groupBy('tanggal')->whereBetween('tanggal', [Carbon::now()->setTimezone('Asia/Jakarta')->startOfWeek(), Carbon::now()->setTimezone('Asia/Jakarta')->endOfWeek()])->get();
        if ($pengeluaran_mingguan->isEmpty()) {
             $pengeluaran_mingguan = '0';
        }else{
            $object = json_decode(json_encode($pengeluaran_mingguan), FALSE);
            $arr_new = array_sum(array_column($object, 'total_pengeluaran'));
            $pengeluaran_mingguan = $arr_new;
        }

        return view('pages.home', compact('title','sidebar','pemasukan_now','pengeluaran_now','pemasukan_mingguan','pengeluaran_mingguan'));
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
}
