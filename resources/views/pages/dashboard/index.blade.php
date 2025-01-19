@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                @foreach ($count_jurusan as $cj )
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ $cj->jurusan }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $cj->student_count }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referral URL</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">2,100</div>
                                <div class="font-weight-bold mb-1">Google</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="80%"
                                        aria-valuenow="80"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,880</div>
                                <div class="font-weight-bold mb-1">Facebook</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="67%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,521</div>
                                <div class="font-weight-bold mb-1">Bing</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="58%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">884</div>
                                <div class="font-weight-bold mb-1">Yahoo</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="36%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">473</div>
                                <div class="font-weight-bold mb-1">Kodinger</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="28%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">418</div>
                                <div class="font-weight-bold mb-1">Multinity</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="20%"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Popular Browser</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="browser browser-chrome"></div>
                                    <div class="font-weight-bold mt-2">Chrome</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 48%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-firefox"></div>
                                    <div class="font-weight-bold mt-2">Firefox</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 26%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-safari"></div>
                                    <div class="font-weight-bold mt-2">Safari</div>
                                    <div class="text-muted text-small"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span> 14%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-opera"></div>
                                    <div class="font-weight-bold mt-2">Opera</div>
                                    <div class="text-muted text-small">7%</div>
                                </div>
                                <div class="col text-center">
                                    <div class="browser browser-internet-explorer"></div>
                                    <div class="font-weight-bold mt-2">IE</div>
                                    <div class="text-muted text-small"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 5%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-sm-5 mt-md-0">
                        <div class="card-header">
                            <h4>Visitors</h4>
                        </div>
                        <div class="card-body">
                            <div id="visitorMap"></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
