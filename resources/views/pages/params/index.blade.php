@extends('layouts.app')

@section('title', 'Jurusan')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

        <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">

    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $menu }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">{{ $type_menu }}</a></div>
                    <div class="breadcrumb-item">{{ $menu }}</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $menu }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Sekolah</th>
                                                <th>Alamat Sekolah</th>
                                                <th>Awal Pendaftaran</th>
                                                <th>Akhir Pendaftaran</th>
                                                <th>Uang pendaftaran</th>
                                                <th>Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $form }}</h4>
                            </div>
                            <form id="formparams" action="" method="method" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" name="nama_sekolah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Alamat Sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" name="alamat_sekolah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Awal Pendafatran Sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="date" class="form-control" name="awal_pendaftaran">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Akhir Pendafatran Sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="date" class="form-control" name="akhir_pendaftaran">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Uang Daftar</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" name="uang_daftar">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Logo</label>
                                        <div class="col-sm-12 ">
                                            <input type="file" class="form-control" name="logo">

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script>
        var dt = "";
        var formUrl;
        var method;

        method = 'POST';
        formUrl = "{{ route('params.store') }}"


        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            dt = $('#table-1').DataTable({
                "destroy": true,
                "processing": true,
                "select": true,
                // "scrollX": true,
                "ajax": {
                    "url": "{{ route('getDataParam') }}",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "nama_sekolah",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "alamat_sekolah",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "awal_pendaftaran",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "akhir_pendaftaran",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "uang_daftar",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "logo",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "index",
                        orderable: true,
                        searchable: true,
                        class: "text-center"
                    }
                ],
                "columnDefs": [

                {
                        "render": function(data, type, row, meta) {

                            var imageUrl = "{{ Storage::url('url') }}".replace('url',row.logo)
                            var result =`<img src="${imageUrl}" width="80" height="80">`;
                            return result;
                        },
                        "targets": 6
                    },

                    {
                        "render": function(data, type, row, meta) {
                            var result =
                                `<button class="btn btn-sm btn-success" type="button" onclick='edit(${meta.row})'>Edit</button> &nbsp;`;
                            result +=
                                `<button class="btn btn-sm btn-danger" type="button" onclick='remove(${meta.row})'>Hapus</button>`;
                            return result;
                        },
                        "targets": 7
                    },
                ]
            });
        });

        function edit(obj) {
            var data = dt.row(obj).data();
            $("#formparams").deserialize(data)



            method = 'POST';
            formUrl = "{{ route('params.update') }}";

        }



        $("#formparams").submit(function(e) {

            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: formUrl,
                type: method,
                data: formData,
                processData: false,
                contentType: false, // Pastikan konten tipe diatur ke false
                success: function(data, textStatus, jqXHR) {

                    let view = jQuery.parseJSON(data);
                    if (view.status == true) {
                        toastr.success(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(view.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    })

                }

            });
        });

        function remove(obj) {

            let data = dt.row(obj).data();
            Swal
                .fire({
                    title: 'Apakah anda yakin.?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('params.destroy', ':id') }}".replace(':id', data.id),
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data, textStatus, jqXHR) {
                                let view = jQuery.parseJSON(data);
                                if (view.status == true) {
                                    toastr.success(view.message);
                                    setTimeout(function() {
                                        location.reload();
                                    }, 500);
                                } else {
                                    toastr.error(view.message);
                                    setTimeout(function() {
                                        location.reload();
                                    }, 500);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                toastr.error('Data gagal dihapus.');
                            }
                        });
                    }
                })


        }
    </script>
@endpush


