@extends('layouts.main')

@section('content')
<form id="demo-form2" action="#" data-parsley-validate class="form-horizontal form-label-left">

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="date" name="tanggal" id="tanggal" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label for="barang" class="col-form-label col-md-3 col-sm-3 label-align">Barang</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="barang" class="form-control" type="text" name="barang" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="motif">Motif<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="motif" name="motif" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label for="ukuran" class="col-form-label col-md-3 col-sm-3 label-align">Ukuran</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="ukuran" class="form-control" type="text" name="ukuran" required>
        </div>
    </div>
    <div class="item form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Penjualan</label>
        <div class="col-md-6 col-sm-6 ">
            <select class="form-control" name="jenis-penjualan" id="jenis-penjualan" onclick="cekKeterangan()" required>
                <option>-- Pilih --</option>
                <option value="online">Online</option>
                <option value="offline">Offline</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label for="keterangan" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="keterangan" class="form-control" type="text" name="keterangan" required>
        </div>
    </div>
    <div class="item form-group">
        <label for="jumlah" class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="jumlah" class="form-control" type="number" name="jumlah" required>
        </div>
    </div>
    <div class="item form-group">
        <label for="total-harga" class="col-form-label col-md-3 col-sm-3 label-align">Total Harga</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="total-harga" class="form-control" type="number" name="total-harga" required>
        </div>
    </div>
    
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3 d-flex justify-content-center mt-3">
            <a href="/pemasukan/detail" class="btn btn-secondary" type="button">Kembali</a>
            <button class="btn btn-info" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </div>

</form>
@endsection