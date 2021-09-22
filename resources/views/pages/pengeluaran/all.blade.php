@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row">
                <p class="text-muted font-13 m-b-30 col-md-8 col-12">
                    Halaman ini menampilkan keseluruhan laporan pemasukan. Klik <span class="text-primary font-weight-bold">Cari</span> untuk melihat laporan sesuai tanggal awal dan tanggal akhir.  Klik <span class="text-primary font-weight-bold">Cetak</span> untuk mencetak laporan sesuai tanggal awal sampai tanggal akhir ke dalam file excel.
                    </p>
            </div>
            <div class="row d-flex justify-content-between my-3">
                <div class="left-side">

                </div>
                <div class="header-search col-md-10 col-12">
                    <form action="" method="POST" >
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal Awal<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" name="tanggal" id="tanggal" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal Akhir<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" name="tanggal" id="tanggal" required="required" class="form-control ">
                            </div>
                        </div>
                        <center class="mb-5">
                            <button type="button" class="btn btn-sm btn-success m-1">Cetak</button>
                        </center>
                    </form>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama/instansi</th>
                        <th>AB</th>
                        <th>Konsumsi</th>
                        <th>Transportasi</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>1</td>
                        <td>20-01-2021</td>
                        <td>Sunar</td>
                        <td></td>
                        <td>Rp. 100.000</td>
                        <td>Rp. 20.000</td>
                        <td>Bensin dan Uang Makan</td>
                        <td>Rp. 120.000</td>
                        <td>
                            <a href="/pengeluaran/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pengeluaran/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>20-01-2021</td>
                        <td>Encrit</td>
                        <td>Rp. 50.000</td>
                        <td></td>
                        <td></td>
                        <td>bensin dan lem</td>
                        <td>Rp. 50.000</td>
                        <td>
                            <a href="/pengeluaran/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pengeluaran/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>20-01-2021</td>
                        <td>Riski</td>
                        <td>Rp. 20.000</td>
                        <td>Rp. 200.000</td>
                        <td></td>
                        <td>Lakbban dan uang makan</td>
                        <td>Rp. 220.000</td>
                        <td>
                            <a href="/pengeluaran/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pengeluaran/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
          <a href="#" class="btn btn-danger btn-sm">Hapus</a>
        </div>
      </div>
    </div>
  </div>
@endsection