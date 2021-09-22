@extends('layouts.main')

@section('content')

        
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="header row d-flex justify-content-between">
                <p class="text-muted font-13 m-b-30 col-md-8 col-12">
                    Halaman ini menampilkan rangkuman laporan Pengeluaran tiap hari. Klik <span class="text-primary font-weight-bold">Lihat Semua Pengeluaran</span> untuk melihat keseluruhan laporan pengeluaran.  Klik <span class="text-primary font-weight-bold">Detail</span> untuk melihat detail pengeluaran dalam 1 hari.
                    </p>
                    <div class="header-button">
                        <a href="/pengeluaran/all" class="btn btn-sm btn-info ml-1"> <i class="fa fa-eye"></i> Lihat Semua Pengeluaran</a>
                        <a href="/pengeluaran/tambah" class="btn btn-sm btn-success ml-1"> <i class="fa fa-plus"></i> Tambah Pengeluaran</a>
                    </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Detail</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>1</td>
                        <td>20-01-2021</td>
                        <td>Rp. 2.900.000</td>
                        <td><a href="/pengeluaran/detail" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>19-01-2021</td>
                        <td>Rp. 2.100.000</td>
                        <td><a href="/pengeluaran/detail" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>18-01-2021</td>
                        <td>Rp. 3.100.000</td>
                        <td><a href="/pengeluaran/detail" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>17-01-2021</td>
                        <td>Rp. 1.900.000</td>
                        <td><a href="/pengeluaran/detail" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection