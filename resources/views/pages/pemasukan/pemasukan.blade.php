<meta name="csrf-token" content="{{ csrf_token() }}"> 
<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js')  }}"></script>
@extends('layouts.main')

@section('content')        
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="header row d-flex justify-content-between">
                <p class="text-muted font-13 m-b-30 col-md-8 col-12">
                    Halaman ini menampilkan rangkuman laporan pemasukan tiap hari. Klik <span class="text-primary font-weight-bold">Lihat Semua Pemasukan</span> untuk melihat keseluruhan laporan pemasukan.  Klik <span class="text-primary font-weight-bold">Detail</span> untuk melihat detail pemasukan dalam 1 hari.
                    </p>
                    <div class="header-button">
                        <a href="/pemasukan/all" class="btn btn-sm btn-info ml-1"> <i class="fa fa-eye"></i> Lihat Semua Pemasukan</a>
                        <a href="{{ route('pemasukan.create') }}" class="btn btn-sm btn-success ml-1"> <i class="fa fa-plus"></i> Tambah Pemasukan</a>
                    </div>
            </div>
            <table id="datatable-pemasukan" class="table table-striped table-bordered" style="width:100%"> 
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pemasukan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        });
  
        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#datatable-pemasukan').DataTable({
                // destroy: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('pemasukan.index') }}",
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', orderable: false,searchable: false
                    },
                    {
                        data: 'tanggal', 
                        name: 'tanggal',
                    },
                    {
                        data: 'total_pemasukan', 
                        name: 'total_pemasukan', 
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,searchable: false
                    },
  
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ')
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });
</script>



@endsection

