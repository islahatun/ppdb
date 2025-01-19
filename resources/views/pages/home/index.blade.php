@extends('layouts.home')
@section('container')



        <!-- Home -->

        <div class="home">

            <!-- Hero Slider -->
            <div class="hero_slider_container">
                <div class="hero_slider owl-carousel">

                    @foreach ($slider as $s)
                        <!-- Hero Slide -->
                        <div class="hero_slide">
                            <div class="hero_slide_background"
                                style="background-image:url({!! asset('storage/' . $s?->gambar) !!}); background-size: cover; background-position: center;">
                            </div>
                            <div
                                class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                                <div class="hero_slide_content text-center">
                                    <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your
                                        <span>Education</span> today!
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
                <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
            </div>

        </div>

        <div class="hero_boxes">
            <div class="hero_boxes_inner">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{!! asset('assets/home/images/earth-globe.svg') !!}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Jurusan</h2>
                                    {{-- <a href="courses.html" class="hero_box_link">view more</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{!! asset('assets/home/images/books.svg') !!}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Blog</h2>
                                    {{-- <a href="courses.html" class="hero_box_link">view more</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{!! asset('assets/home/images/professor.svg') !!}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Info</h2>
                                    {{-- <a href="teachers.html" class="hero_box_link">view more</a> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Popular -->

        <div class="popular page_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Jurusan</h1>
                        </div>
                    </div>
                </div>

                <div class="row course_boxes">

                    @foreach ( $jurusan as $j )
                     <!-- Popular Course Item -->
                     <div class="col-lg-4 course_box">
                        <div class="card">
                            <img class="card-img-top" src="{!! asset('assets/home/images/course_1.jpg') !!}"
                                alt="https://unsplash.com/@kellybrito">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="courses.html">{{ $j->jurusan }}</a></div>

                            </div>

                        </div>
                    </div>
                    @endforeach




                </div>
            </div>
        </div>

        <!-- Register -->

        <div class="register">

            <div class="container-fluid">

                <div class="row row-eq-height">
                    <div class="col-lg-6 nopadding">

                        <!-- Register -->

                        {{-- <div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Register now and get a discount <span>50%</span> discount until 1 January</h1>
							<p class="register_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempo.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="#">register now</a></div>
						</div>
					</div> --}}

                    </div>

                    <div class="col-lg-6 nopadding">

                        <!-- Search -->

                        {{-- <div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url({!! asset('assets/home/images/search_background.jpg') !!});"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Search for your course</h1>
							<form id="search_form" class="search_form" action="post">
								<input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Course Name" required="required" data-error="Course name is required.">
								<input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Category">
								<input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Degree">
								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">search course</button>
							</form>
						</div>
					</div> --}}

                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->

        <div class="services page_section">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Info</h1>
                        </div>
                    </div>
                </div>

                <div class="row services_row">
                    @foreach ($info as $i )
                    <div
                        class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{!! asset('assets/home/images/exam.svg') !!}" alt="">
                        </div>
                        <h3>Indoor Courses</h3>
                        <p>{{ $i->info }}</p>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>

        <!-- Events -->

        <div class="events page_section">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Blog</h1>
                        </div>
                    </div>
                </div>

                <div class="event_items">

                    @foreach ($blog as $b)
                        <!-- Event Item -->
                        <div class="row event_item">
                            <div class="col">
                                <div class="row d-flex flex-row align-items-end">

                                    <div class="col-lg-2 order-lg-1 order-2">
                                        <div
                                            class="event_date d-flex flex-column align-items-center justify-content-center">
                                            <div class="event_day">07</div>
                                            <div class="event_month">January</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 order-lg-2 order-3">
                                        <div class="event_content">
                                            <div class="event_name"><a class="trans_200"
                                                    href="#">{{ $b->judul }}</a></div>
                                            {{-- <div class="event_location">Grand Central Park</div> --}}
                                            <p>{!! $b->deskripsi !!}</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 order-lg-3 order-1">
                                        <div class="event_image">
                                            <img src="{!! asset('storage/' . $b?->gambar) !!}"
                                                alt="https://unsplash.com/@theunsteady5">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>
        </div>




@endsection
