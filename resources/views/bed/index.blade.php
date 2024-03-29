@extends('layouts.master')
@section('title', 'Data Tempat Tidur')
@push('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <style>
        .dataTables_length,
        .dataTables_filter {
            margin-left: 30px;
            float: right;
        }

        .select2-dropdown {
            font-size: 12px;
        }

        tfoot {
            display: table-row-group;
        }
    </style>
@endpush

@section('breadcrumbs')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tempat Tidur</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Tempat Tidur</li>
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
                                <button onclick="addForm('{{ route('bed.store') }}')" class="btn btn-sm  btn-success"><i
                                        class="fa fa-plus-circle"></i>
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
                                <form action="" method="post" class="form-pasien">
                                    @csrf
                                    <table id="table"
                                        class="table table-bordered table-hover table-head-fixed text-nowrap">
                                        <thead>
                                            <th>No Kamar</th>
                                            <th>Lantai</th>
                                            <th>Ruangan</th>
                                            <th>Kelas</th>
                                            <th>BOR</th>
                                            <th>Setting</th>
                                            <th>Aktif</th>
                                            <th width="10%">Aksi</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->

    @includeIf('bed.form')
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
    <!-- Select2 -->
    <script src="{{ asset('/') }}plugins/select2/js/select2.full.min.js"></script>


    <script>
        let table;

        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                placeholder: "Select a option",
                allowClear: true,
            })

            table = $("#table").DataTable({
                "processing": true,
                "serverSide": true,
                "autoWidth": false,
                "order": [
                    [1, 'asc'],
                    [0, 'asc'],
                ],
                "dom": 'Blfrtip',
                "buttons": [{
                        extend: 'excel',
                        text: `<i class="fa-fw fas fa-file-excel"></i>`,
                        className: 'btn-xs'
                    },
                    {
                        extend: 'print',
                        text: `<i class="fa-fw fas fa-print"></i>`,
                        className: 'btn-xs'
                    },
                    {
                        text: `<i class="fa-fw fas fa-sync-alt"></i>`,
                        action: function(e, dt, node, config) {
                            dt.ajax.reload(null, false);
                        },
                        className: 'btn-xs'
                    },
                    {
                        extend: 'colvis',
                        text: `<i class="fa-fw fas fa-eye"></i>`,
                        className: 'btn-xs'
                    },
                ],
                "ajax": {
                    url: '{{ route('bed.data') }}',
                },
                columns: [{
                        data: 'no_kamar'
                    },
                    {
                        data: 'ruangan_bed.lantai'
                    },
                    {
                        data: 'kode_ruangan'
                    },
                    {
                        data: 'kelas_bed.nama_kelas'
                    },
                    {
                        data: 'flagbor',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'flagsetting',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'aktif',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-form').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form')
                            .serialize())
                        .done((response) => {
                            $('#modal-form').modal('hide');
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
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Data Bed');
            $('#modal-form [name=kode_ruangan]').val(null).trigger('change');
            $('#modal-form [name=id_kelas]').val(null).trigger('change');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            })
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Data Bed');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            })

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=no_kamar]').val(response.no_kamar);
                    $('#modal-form [name=kode_ruangan]').val(response.kode_ruangan).trigger('change');
                    $('#modal-form [name=id_kelas]').val(response.id_kelas).trigger('change');
                    if (response.flagbor == 1) {
                        $('#flagbor').prop("checked", true);
                    }
                    if (response.flagsetting == 1) {
                        $('#flagsetting').prop("checked", true);
                    }
                    if (response.aktif == 1) {
                        $('#aktif').prop("checked", true);
                    }
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>
@endpush
