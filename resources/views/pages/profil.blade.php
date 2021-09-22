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
                        <td>Jhon Doe</td>
                    </tr>
                    <tr >
                        <td>Username</td>
                        <td class="text-right">:</td>
                        <td>johndoe</td>
                    </tr>
                    <tr >
                        <td>password</td>
                        <td class="text-right">:</td>
                        <td>********</td>
                    </tr>
                    <tr >
                        <td>Email</td>
                        <td class="text-right">:</td>
                        <td>jhondoe@gmail.com</td>
                    </tr>
                    <tr >
                        <td>No telepon</td>
                        <td class="text-right">:</td>
                        <td>087281921</td>
                    </tr>
                    <tr >
                        <td>Nama Toko</td>
                        <td class="text-right">:</td>
                        <td>Toko Batik AV</td>
                    </tr>
                </table>
                <center><a href="/profil/edit" class="btn btn-sm btn-info">Ubah</a></center>
            </div>
        </div>
    </div>
</div>


@endsection