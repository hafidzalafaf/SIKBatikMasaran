<meta name="csrf-token" content="{{ csrf_token() }}"> 
<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js')  }}"></script>
@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
             @foreach ($post->take(1) as $post )                
            <p class="text-muted font-13 m-b-30">
            Menampilkan rincian laporan pengeluaran tanggal <span class="text-primary font-weight-bold">{{ $post->tanggal }}</span>. 
            </p>
            @endforeach
            <table id="pengeluaran-detail" class="table table-striped table-bordered" style="width:100%">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama/instansi</th>
                        <th>AB</th>
                        <th>Konsumsi</th>
                        <th>Transportasi</th>
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
          <a href="#" id="tombol-hapus" class="btn btn-danger btn-sm">Hapus</a>
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
            $('#pengeluaran-detail').DataTable({
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
                    .appendTo( '#pengeluaran-detail_wrapper .col-sm-6:eq(0)' ); 
            },
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ url('pengeluaran/'. date('Y-m-d', strtotime($post->tanggal))) }}",
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
                        data: 'instansi', 
                        name: 'instansi', 
                    },
                    {
                        data: 'ab', 
                        name: 'ab', 
                    },
                    {
                        data: 'konsumsi', 
                        name: 'konsumsi', 
                    },
                    {
                        data: 'transportasi', 
                        name: 'transportasi', 
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
                        targets: [3,4,5],
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
                            var oTable = $('#pengeluaran-detail').dataTable();
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