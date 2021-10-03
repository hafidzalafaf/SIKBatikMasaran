@extends('layouts.main')

@section('content')
<form id="demo-form2" action="#" data-parsley-validate class="form-horizontal form-label-left">

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="name" name="nama" id="nama" required="required" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="email" class="form-control" type="text" name="email" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="password" name="password" required="required" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label for="telepon" class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="telepon" class="form-control" type="number" name="telepon" required>
        </div>
    </div>
    <div class="item form-group">
        <label for="nama-toko" class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="nama-toko" id="nama-toko" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="item form-group">
        <label for="jabatan" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>

        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="jabatan" class="form-control" name="jabaran" required>
                <option>-- Pilih --</option>
                <option value="pemilik">Pemilik</option>
                <option value="pemilik">Admin</option>
              </select>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3 d-flex justify-content-center mt-3">
            <a href="/profil" class="btn btn-secondary" type="button">Kembali</a>
            <button class="btn btn-info" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </div>

</form>


@endsection