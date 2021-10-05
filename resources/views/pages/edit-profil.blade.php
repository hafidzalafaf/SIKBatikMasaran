<meta name="csrf-token" content="{{ csrf_token() }}"> 
@extends('layouts.main')

@section('content')
<form id="demo-form2" method="post" action="{{ route('profil.update', $post->id) }}" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    {{ method_field('PUT') }}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="name" name="nama" id="nama" required="required" class="form-control" value="{{ $post->name }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="email" class="form-control" type="text" name="email" required value="{{ $post->email }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="telepon" class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="telepon" class="form-control" type="number" name="telepon" required value="{{ $post->no_telp }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="nama-toko" class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="nama_toko" class="form-control" type="text" name="nama_toko" required value="{{ $post->nama_toko }}">
        </div>
    </div>
    @if (auth()->user()->hasrole('Admin'))
    <div class="item form-group">
        <label for="jabatan" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="jabatan" class="form-control" name="jabatan" required>
                <option value="" holder>Pilih</option>
                <option value="Pemilik" <?php if($post->roles[0]->name=="Pemilik") echo 'selected="selected"'; ?>>Pemilik</option>
                <option value="Admin" <?php if($post->roles[0]->name=="Admin") echo 'selected="selected"'; ?>>Admin</option>
              </select>
        </div>
    </div>
    @else
    <div class="item form-group">
        <label for="jabatan" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="jabatan" class="form-control" name="jabatan" required>
                <option value="" holder>Pilih</option>
                <option value="Pemilik" <?php if($post->roles[0]->name=="Pemilik") echo 'selected="selected"'; ?>>Pemilik</option>
                <option value="Admin" <?php if($post->roles[0]->name=="Admin") echo 'selected="selected"'; ?> disabled>Admin</option>
              </select>
        </div>
    </div>    
    @endif
   
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