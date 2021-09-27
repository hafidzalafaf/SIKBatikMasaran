<meta name="csrf-token" content="{{ csrf_token() }}"> 
<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js')  }}"></script>

@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row">
                <p class="text-muted font-13 m-b-30 col-md-8 col-12">
                    Halaman ini menampilkan keseluruhan laporan pemasukan.  Klik <span class="text-primary font-weight-bold">Cari</span> untuk mencari laporan sesuai tanggal awal sampai tanggal akhir ke dalam file excel.
                    </p>
            </div>
            <div class="row d-flex justify-content-between my-3">
                <div class="left-side">

                </div>
                <div class="header-search col-md-10 col-12">
                    <form action="" method="POST" >
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal Awal<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" name="min" id="min" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal Akhir<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" name="max" id="max" required="required" class="form-control ">
                            </div>
                        </div>
                        <center class="mb-5">
                            <button type="button" class="btn btn-sm btn-success m-1">Cari</button>
                        </center>
                    </form>
                </div>
            </div>
            <table id="pemasukan-all" class="table table-striped table-bordered" style="width:100%">
                
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Ukuran</th>
                    <th>Motif</th>
                    <th>Jumlah</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger btn-sm" name="tombol-hapus" id="tombol-hapus">Hapus</button>
        </div>
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
            $('#pemasukan-all').DataTable({
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
                    .appendTo( '#pemasukan-all_wrapper .col-sm-6:eq(0)' ); 
            },
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ url('/pemasukan/all') }}",
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
                        data: 'barang', 
                        name: 'barang', 
                    },
                    {
                        data: 'ukuran', 
                        name: 'ukuran', 
                    },
                    {
                        data: 'motif', 
                        name: 'motif', 
                    },
                    {
                        data: 'jumlah', 
                        name: 'jumlah', 
                    },
                    {
                        data: 'nominal', 
                        name: 'nominal', 
                    },
                    {
                        data: 'keterangan', 
                        name: 'keterangan', 
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,searchable: false
                    },
  
                ],
                columnDefs: [
                    {
                        targets: 6,
                        render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ')
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });


            //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
            $(document).on('click', '.delete', function () {
                    dataId = $(this).attr('id');
                    $('#exampleModal').modal('show');
                });

            //jika tombol hapus pada modal konfirmasi di klik maka
            $('#tombol-hapus').click(function () {
                $.ajax({
                    url: dataId, //eksekusi ajax ke url ini
                    type: 'delete',
                    beforeSend: function () {
                        $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                    },
                    success: function (data) { //jika sukses
                        setTimeout(function () {
                            $('#exampleModal').modal('hide'); //sembunyikan konfirmasi modal
                            var oTable = $('#pemasukan-all').dataTable();
                            oTable.fnDraw(false); //reset datatable
                        });
                        iziToast.warning({ //tampilkan izitoast warning
                            title: 'Data Berhasil Dihapus',
                            message: '{{ Session('
                            delete ')}}',
                            position: 'bottomRight'
                        });
                    }
          })
      });
        });
        
</script>
@endsection