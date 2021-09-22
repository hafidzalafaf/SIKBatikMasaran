@extends('layouts.main')

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-info" style="max-width: 18rem;">
            <div class="card-header">Pemasukan Hari Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">Rp. 2.900.000</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-warning" style="max-width: 18rem;">
            <div class="card-header">Pengeluaran Hari Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">Rp. 1.800.000</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-info" style="max-width: 18rem;">
            <div class="card-header">Pemasukan Minggu Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">Rp. 12.100.000</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-warning" style="max-width: 18rem;">
            <div class="card-header">Pengeluaran Minggu Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">Rp. 8.800.000</h5>
            </div>
        </div>
    </div>
</div>

@endsection