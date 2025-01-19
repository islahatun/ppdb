@extends('layouts.app')

@section('title', 'Pendafataran')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

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
                                                <th>No Pendaftaran</th>
                                                <th>NISN</th>
                                                <th>Nama Siswa</th>
                                                <th>Asal Sekolah</th>
                                                <th>Jurusan</th>
                                                <th>status</th>
                                                <th>Aksi</th>
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
                            <form id="formBlog" action="" method="method" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="no_pendaftaran">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Jurusan Pilihan</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="jurusan">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">nisn</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="nisn">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Siswa</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="name">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Asal sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="sekolah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Alamat Sekolah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="alamat_sekolah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="nama_ayah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Pekerjaan Ayah</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="pekerjaan_ayah">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Nama Ibu</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="nama_ibu">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Pekerjaan Ibu</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="pekerjaan_ibu">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" readonly name="alamat">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Kartu Keluarga</label>
                                        <div class="col-sm-12 ">
                                            <a  id="kk-link" href="" target="_blank">Kartu Keluarga</a>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Akta</label>
                                        <div class="col-sm-12 ">
                                            <a  id="akta-link" href="" target="_blank">Akta</a>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Ijazah</label>
                                        <div class="col-sm-12 ">
                                            <a  id="ijazah-link" href="" target="_blank">Ijazah</a>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-12 col-md-3 col-lg-3">Foto</label>
                                        <div class="col-sm-12 ">
                                            <a  id="foto-link" href="" target="_blank">Foto</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Validasi</button>
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
        formUrl = "{{ route('student.store') }}"


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
                    "url": "{{ route('getDataStudent') }}",
                },
                "columns": [{
                        data: "DT_RowIndex",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "no_pendaftaran",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "nisn",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "name",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "sekolah",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jurusan",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "validasi",
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
                            var result =
                                `<button class="btn btn-sm btn-success" type="button" onclick='edit(${meta.row})'>Edit</button> &nbsp;`;
                            // result +=
                            //     `<button class="btn btn-sm btn-danger" type="button" onclick='remove(${meta.row})'>Hapus</button>`;
                            return result;
                        },
                        "targets": 7
                    },
                ]
            });
        });

        function edit(obj) {
            var data = dt.row(obj).data();
            $("#formBlog").deserialize(data)




        if (data.ijazah) {
            $("#ijazah-link").attr("href", data.ijazah);
        } else {
            $("#ijazah-link").attr("href", "#").text("Ijazah Tidak Tersedia");
        }

            method = 'POST';
            formUrl = "{{ route('student.update') }}";

        }



        $("#formBlog").submit(function(e) {

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
                            url: "{{ route('student.destroy', ':id') }}".replace(':id', data.id),
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
