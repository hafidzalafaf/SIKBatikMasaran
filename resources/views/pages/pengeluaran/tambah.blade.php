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
        <label for="nama-instansi" class="col-form-label col-md-3 col-sm-3 label-align">Nama/Instansi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="nama-instansi" class="form-control" type="text" name="nama-instansi" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ab">AB<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="ab" name="ab" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label for="konsumsi" class="col-form-label col-md-3 col-sm-3 label-align">Konsumsi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="konsumsi" class="form-control" type="text" name="konsumsi">
        </div>
    </div>
    <div class="item form-group">
        <label for="transportasi" class="col-form-label col-md-3 col-sm-3 label-align">transportasi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="transportasi" class="form-control" type="number" name="transportasi">
        </div>
    </div>
    <div class="item form-group">
        <label for="keterangan" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required></textarea>
        </div>
    </div>
    <div class="item form-group">
        <label for="jumlah" class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="jumlah" class="form-control" type="number" name="jumlah" required>
        </div>
    </div>
    
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3 d-flex justify-content-center mt-3">
            <a href="/pengeluaran" class="btn btn-secondary" type="button">Kembali</a>
            <button class="btn btn-info" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </div>

</form>


@endsection