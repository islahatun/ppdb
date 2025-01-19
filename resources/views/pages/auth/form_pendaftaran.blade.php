@extends('layouts.auth2')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>



        <div class="card-body">
            <form id="form_Regis" action="" method="method" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Data Diri</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Orang tua</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            role="tab" aria-controls="contact" aria-selected="false">Sekolah</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="kartu-tab" data-toggle="tab" href="#kartu" role="tab"
                                            aria-controls="kartu" aria-selected="false">Kartu Peserta</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <input name="user_id" value="{{ $user->id }}" hidden>
                                        <div class="form-group">
                                            <label for="frist_name">Nama</label>
                                            <input required id="name" type="text" value="{{ $user->name }}"
                                                class="form-control" name="name" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Nisn</label>
                                            <input required id="nisn" type="text" value="{{ $user->nisn }}"
                                                class="form-control" name="nisn">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input required id="email" type="email" value="{{ $user->email }}"
                                                class="form-control" name="email">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Telepon</label>
                                            <input required id="phone" type="text" value="{{ $user->phone }}"
                                                class="form-control" name="phone">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Jenis Kelamin</label>
                                            <select required name="gender" class="form-control">
                                                <option value=""></option>
                                                <option value="1"
                                                    @if ($user->gender == 1) @selected(true) @endif>
                                                    Laki-Laki</option>
                                                <option value="0"
                                                    @if ($user->gender == 0) @selected(true) @endif>
                                                    Perempuan</option>

                                            </select>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tanggal Lahir</label>
                                            <input required id="tgl_lahir" type="date" class="form-control"
                                                name="tgl_lahir">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tempat Lahir</label>
                                            <input required id="tempat_lahir" type="text" class="form-control"
                                                name="tempat_lahir">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Alamat</label>
                                            <input required id="alamat" type="text" class="form-control"
                                                name="alamat">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Foto</label>
                                            <input required id="profil" type="file" class="form-control"
                                                name="profil">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label for="frist_name">Nama Ayah</label>
                                            <input required id="nama_ayah" type="text" class="form-control"
                                                name="nama_ayah" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Pekerjaan Ayah</label>
                                            <input required id="pekerjaan_ayah" type="text" class="form-control"
                                                name="pekerjaan_ayah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Tanggal lahir Ayah</label>
                                            <input required id="tgl_lahir_ayah" type="date" class="form-control"
                                                name="tgl_lahir_ayah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Nama Ibu</label>
                                            <input required id="nama_ibu" type="text" class="form-control"
                                                name="nama_ibu">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Pekerjaan Ibu</label>
                                            <input required id="pekerjaan_ibu" type="text" class="form-control"
                                                name="pekerjaan_ibu">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tanggal lahir Ibu</label>
                                            <input required id="tgl_lahir_ibu" type="date" class="form-control"
                                                name="tgl_lahir_ibu">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Alamat Orang tua</label>
                                            <input required id="alamat_orangtua" type="text" class="form-control"
                                                name="alamat_orangtua">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="form-group">
                                            <label for="email">Sekolah asal</label>
                                            <input required id="sekolah" type="text" class="form-control"
                                                name="sekolah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Alamat Sekolah</label>
                                            <input required id="alamat_sekolah" type="text" class="form-control"
                                                name="alamat_sekolah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">No Ijazah</label>
                                            <input required id="no_ijazah" type="text" class="form-control"
                                                name="no_ijazah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Ijazah</label>
                                            <input required id="ijazah" type="file" class="form-control"
                                                name="ijazah">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Kartu Keluarga</label>
                                            <input required id="kk" type="file" class="form-control"
                                                name="kk">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Akta</label>
                                            <input required id="akta" type="file" class="form-control"
                                                name="akta">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Jurusan yang akan dituju</label>
                                            <select required name="jurusan_id" class="form-control">
                                                <option value=""></option>
                                                @foreach ($jurusan as $j)
                                                    <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                                                @endforeach

                                            </select>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group" id="registrasi">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Register
                                            </button>
                                        </div>
                                    </div>

            </form>

            <div class="tab-pane fade" id="kartu" role="tabpanel" aria-labelledby="kartu-tab">
                <div class="row mt-3">
                    <form id="form_kartu"  action="" method="method" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-8">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Nomor Pendaftaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="no_pendaftaran" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="user_name" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">NISN</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="nisn" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Asal Sekolah</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="sekolah" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="user_gender" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="tgl_lahir" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Alamat</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly name="alamat" class="form-control-plaintext">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-4">
                                <img id="profil_image" src="" alt="Profil Image" width="350" height="350">
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('download-kartu', ['id' => auth()->user()->id]) }}" target="blank" class="btn btn-primary">Download Kartu Peserta</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>





    </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>


    <script>
        var dt = "";
        var formUrl;
        var method;

        method = 'POST';
        formUrl = "{{ route('save_pendaftaran') }}"




        $("#form_Regis").submit(function(e) {

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
                        window.location.href = "{{ route('form_pendaftaran') }}";
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

        $(function() {

            if({{ $tgl_awal }} == 0 || {{ $tgl_akhir }} == 0){
                $('#registrasi').hide();
            }


            $.get("{{ route('getPendaftaran') }}", function(res) {
                if (res.success) {
                    var data_detail = res.detail;

                    $("#form_Regis").deserialize(data_detail);

                    // function untuk mengambil data users karena ada relasi
                    if (data_detail.user) {
                        for (var key in data_detail.user) {
                            data_detail['user_' + key] = data_detail.user[key];
                        }
                        delete data_detail.user; // Optional: Remove nested user object
                    }

                     $("#form_kartu").deserialize(data_detail);



                     if (data_detail.profil) {

                        var baseUrl = "{{ asset('storage') }}";

                        $("#form_kartu img#profil_image").attr("src", baseUrl +'/'+ data_detail.profil);
                    }
                }
            }, "json")
        })
    </script>
@endpush
