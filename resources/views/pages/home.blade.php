@extends('layouts.main')

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-info" style="max-width: 18rem;">
            <div class="card-header">Pemasukan Hari Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3"> 
                    @if ($pemasukan_now === '0')
                        Rp. 0
                    @else
                        @currency($pemasukan_now[0]->total_pemasukan) 
                    @endif
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-warning" style="max-width: 18rem;">
            <div class="card-header">Pengeluaran Hari Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">
                    @if ($pengeluaran_now === '0')
                        Rp. 0
                    @else
                        @currency($pengeluaran_now[0]->total_pengeluaran) 
                    @endif
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-info" style="max-width: 18rem;">
            <div class="card-header">Pemasukan Minggu Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">
                    @if ($pemasukan_mingguan === '0')
                        Rp. 0
                    @else
                        @currency($pemasukan_mingguan) 
                    @endif
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-3 dashboard-card my-2">
        <div class="card card-sm text-white bg-warning" style="max-width: 18rem;">
            <div class="card-header">Pengeluaran Minggu Ini</div>
            <div class="card-body d-flex flex-column">
                <i class="fa fa-money fa-3x mx-auto"></i>
                <h5 class="card-title mx-auto mt-3">
                    @if ($pengeluaran_mingguan === '0')
                        Rp. 0
                    @else
                        @currency($pengeluaran_mingguan) 
                    @endif
                </h5>
            </div>
        </div>
    </div>
</div>

@endsection