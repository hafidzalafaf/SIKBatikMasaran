@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div id="profil-image" class="mx-auto" style="background-image:url('{{ asset ('assets/production/images/user.png') }}')">
        </div>
    </div>
    <div class="col-12">
        <div class="row ">
            <div class="col-md-6 col-lg-4 mx-auto">
                <table class="table mt-5">
                    <tr >
                        <td>Nama</td>
                        <td class="text-right">:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr >
<<<<<<< HEAD
                        <td>Password</td>
                        <td class="text-right">:</td>
                        <td>********</td>
                    </tr>
                    <tr >
=======
>>>>>>> c84ca0800837430f8b8954a9a6f681b9e82c798b
                        <td>Email</td>
                        <td class="text-right">:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr >
                        <td>No telepon</td>
                        <td class="text-right">:</td>
                        <td>{{ $user->no_telp }}</td>
                    </tr>
                    <tr >
                        <td>Nama Toko</td>
                        <td class="text-right">:</td>
                        <td>{{ $user->nama_toko }}</td>
                    </tr>
                    <tr >
                        <td>Jabatan</td>
                        <td class="text-right">:</td>
                        <td>{{ $user->roles[0]->name }}</td>
                    </tr>
                </table>
                <center><a href={{ "route('profil.edit', $user->id) }}}" class="btn btn-sm btn-info">Ubah</a></center>
                <div class="d-flex justify-content-center">
                    <a href="/profil/edit" class="btn btn-sm btn-info">Ubah</a>
                    <a href="#" class="btn btn-sm btn-warning">Reset Password</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection