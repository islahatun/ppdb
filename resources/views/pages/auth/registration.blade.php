@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form id="formRegis" action="" method="method" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label for="frist_name">Nama</label>
                        <input required id="name"
                            type="text"
                            class="form-control"
                            name="name"
                            autofocus>
                    </div>

                <div class="form-group">
                    <label for="email">Nisn</label>
                    <input required id="nisn"
                        type="text"
                        class="form-control"
                        name="nisn">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input required id="email"
                        type="email"
                        class="form-control"
                        name="email">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Telepon</label>
                    <input required id="phone"
                        type="text"
                        class="form-control"
                        name="phone">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Jenis Kelamin</label>
                    <select required name="gender"  class="form-control">
                        <option value=""></option>
                        <option value="1">Laki-Laki</option>
                        <option value="0">Perempuan</option>

                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password"
                            class="d-block">Password</label>
                        <input required id="password"
                            type="password"
                            class="form-control pwstrength"
                            data-indicator="pwindicator"
                            name="password">
                        <div id="pwindicator"
                            class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="password2"
                            class="d-block">Password Confirmation</label>
                        <input required id="password2"
                            type="password"
                            class="form-control"
                            name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
            <a href="/login">Sudah memiliki Akun? Login</a>
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
        formUrl = "{{ route('registration.store') }}"



        $("#formRegis").submit(function(e) {

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


    </script>
@endpush
