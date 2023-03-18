@extends('layouts.master')
@section('title', 'Kategori')
@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        .dataTables_length,
        .dataTables_filter {
            margin-left: 30px;
            float: right;
        }
    </style>
@endpush

@section('breadcrumbs')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button onclick="addForm('{{ route('kategori.store') }}')"
                                    class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus-circle"></i>
                                    Tambah</button>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">

                                <table id="table" class="table table-bordered table-hover table-head-fixed text-nowrap">
                                    <thead>
                                        <th width="5%">No</th>
                                        <th>Kategori</th>
                                        <th width="10%">Aksi</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->

    @includeIf('kategori.form')
@endsection


@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <script>
        let table;

        $(function() {
            table = $("#table").DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "autoWidth": false,
                "dom": 'Blfrtip',
                // "dom": "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                //     "<'row'<'col-sm-12'rt>>" +
                //     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                // "order": [
                //     [1, 'asc']
                // ],
                "buttons": [
                    "excel",
                    "print",
                    {
                        text: "Refresh",
                        action: function(e, dt, node, config) {
                            dt.ajax.reload(null, false);
                        },
                    },
                    "colvis"
                ],
                "ajax": {
                    url: '{{ route('kategori.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_kategori'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-formkategori').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    // $.ajax({
                    //         url: $('#modal-formkategori form').attr('action'),
                    //         type: 'post',
                    //         data: $('#modal-formkategori form').serialize(),
                    //     })
                    $.post($('#modal-formkategori form').attr('action'), $('#modal-formkategori form')
                            .serialize())
                        .done((response) => {
                            $('#modal-formkategori').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        })
                }
            });

        });

        function addForm(url) {
            $('#modal-formkategori').modal('show');
            $('#modal-formkategori .modal-title').text('Tambah Kategori');
            $('#modal-formkategori form')[0].reset();
            $('#modal-formkategori form').attr('action', url);
            $('#modal-formkategori [name=_method]').val('post');
            $('#modal-formkategori').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            })
        }

        function editForm(url) {
            $('#modal-formkategori').modal('show');
            $('#modal-formkategori .modal-title').text('Edit Kategori');
            $('#modal-formkategori form')[0].reset();
            $('#modal-formkategori form').attr('action', url);
            $('#modal-formkategori [name=_method]').val('put');
            $('#modal-formkategori').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            })

            $.get(url)
                .done((response) => {
                    $('#modal-formkategori [name=nama_kategori]').val(response.nama_kategori);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }

        function deleteData(url, nama) {
            if (confirm('Yakin ingin menghapus data ' + nama +
                    ' ?')) {
                $.post(url, {
                        // '_token': '{{ csrf_token() }}'
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    })
            }

        }
    </script>
@endpush
