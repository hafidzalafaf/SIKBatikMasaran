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
                    Halaman ini menampilkan rangkuman laporan Pengeluaran tiap hari. Klik <span class="text-primary font-weight-bold">Lihat Semua Pengeluaran</span> untuk melihat keseluruhan laporan pengeluaran.  Klik <span class="text-primary font-weight-bold">Detail</span> untuk melihat detail pengeluaran dalam 1 hari.
                    </p>
                    <div class="header-button">
                        <a href="/pengeluaran/all" class="btn btn-sm btn-info ml-1"> <i class="fa fa-eye"></i> Lihat Semua Pengeluaran</a>
                        <a href="{{ route('pengeluaran.create') }}" class="btn btn-sm btn-success ml-1"> <i class="fa fa-plus"></i> Tambah Pengeluaran</a>
                    </div>
            </div>
            <table id="datatable-pengeluaran" class="table table-striped table-bordered" style="width:100%"> 
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pengeluaran</th>
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
            $('#datatable-pengeluaran').DataTable({
                language: {
                    buttons: {
                        // collection : 'Unduh',
                        pdf:'Unduh',
                        print : 'Cetak',
                        excel : 'Excel',
                        csv : 'CSV',
                    }
            },
            
            buttons : [
                        // {extend:'collection', postfixButtons: [ 'pdf', 'excel', 'csv' ]},
                        {extend:'pdf',title: 'laporan', exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},
                        {extend:'print',title: 'laporan', exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},
                        {extend:'excel',title: 'laporan', exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},
                        {extend:'csv',title: 'laporan', exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7 ]}},
                        {extend:'pageLength'},
            ],

            lengthChange: false,
            // buttons: [ 'excel', 'pdf', 'print', 'csv', 'pageLength' ],
                initComplete: function () {
                    this.api().buttons().container() //untuk tombol unduh dan cetak
                    .appendTo( '#datatable-pengeluaran_wrapper .col-sm-6:eq(0)' ); 
            },
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('pengeluaran.index') }}",
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
                        data: 'total_pengeluaran', 
                        name: 'total_pengeluaran', 
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