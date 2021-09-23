@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row">
                <p class="text-muted font-13 m-b-30 col-md-8 col-12">
                    Halaman ini menampilkan keseluruhan laporan pemasukan.  Klik <span class="text-primary font-weight-bold">Cetak</span> untuk mencetak laporan sesuai tanggal awal sampai tanggal akhir ke dalam file excel.
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
                    <th>Barang</th>
                    <th>Ukuran</th>
                    <th>Motif</th>
                    <th>Jumlah</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>1</td>
                        <td>20-01-2021</td>
                        <td>Kemeja</td>
                        <td>L</td>
                        <td>Merak Abu</td>
                        <td>1</td>
                        <td>Rp.300.000</td>
                        <td>PAK DD</td>
                        <td>
                            <a href="/pemasukan/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pemasukan/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>20-01-2021</td>
                        <td>Kaftan</td>
                        <td>M</td>
                        <td>Milo</td>
                        <td>2</td>
                        <td>Rp.400.000</td>
                        <td>PAK Budi</td>
                        <td>
                            <a href="/pemasukan/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pemasukan/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>20-01-2021</td>
                        <td>Kemeja</td>
                        <td>XL</td>
                        <td>Merak Abu</td>
                        <td>3</td>
                        <td>Rp.900.000</td>
                        <td>Bu Ida</td>
                        <td>
                            <a href="/pemasukan/edit" class="btn btn-sm btn-info">Edit</a>
                            <a href="/pemasukan/hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
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