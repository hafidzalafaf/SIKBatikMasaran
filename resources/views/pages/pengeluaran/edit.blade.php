<meta name="csrf-token" content="{{ csrf_token() }}"> 
@extends('layouts.main')

@section('content')
<form id="edit-pengeluaran" method="post" action="{{ route('pengeluaran.update', $post->id) }}" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    {{ method_field('PUT') }}
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="date" name="tanggal" id="tanggal" required="required" class="form-control " value="{{ date('Y-m-d', strtotime($post->tanggal)) }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="nama-instansi" class="col-form-label col-md-3 col-sm-3 label-align">Nama/Instansi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="nama_instansi" class="form-control" type="text" name="nama_instansi" value="{{ $post->instansi }}" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ab">AB<span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" id="ab" name="ab" class="form-control" value="{{ $post->ab }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="konsumsi" class="col-form-label col-md-3 col-sm-3 label-align">Konsumsi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="konsumsi" class="form-control" type="number" name="konsumsi" value="{{ $post->konsumsi }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="transportasi" class="col-form-label col-md-3 col-sm-3 label-align">transportasi</label>
        <div class="col-md-6 col-sm-6 ">
            <input id="transportasi" class="form-control" type="number" name="transportasi" value="{{ $post->transportasi }}">
        </div>
    </div>
    <div class="item form-group">
        <label for="keterangan" class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required>{{ $post->keterangan }}</textarea>
        </div>
    </div>
    
    <div class="ln_solid"></div>
    <div class="item form-group ">
        <div class="col-md-6 col-sm-6 offset-md-3 d-flex justify-content-center mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" type="button">Kembali</a>
            <button class="btn btn-info" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </div>

</form>


@endsection