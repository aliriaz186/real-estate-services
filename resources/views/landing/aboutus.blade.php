@extends('layouts.main')

@section('content')
    <div class="image-cover page-title" style="background:url(assets/img/a.jpg) no-repeat;" data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">About Us</h2>
                    <span class="ipn-subtitle text-light">Who we are & our mission</span>

                </div>
            </div>
        </div>
    </div>

    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <img src="{{asset('assets/img/sb.png')}}" class="img-fluid" alt="" />
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="story-wrap explore-content">

                        <h2>Our Story</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>

    <section>
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Our Mission & Work Process</h2>
                        <p>Professional & Dedicated Team</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box"><i class="ti-user text-danger"></i><span class="steps bg-danger">01</span></div>
                            <div class="middle-icon-features-content">
                                <h4>Create An Account</h4>
                                {{--                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box"><i class="ti-search text-success"></i><span class="steps bg-success">02</span></div>
                            <div class="middle-icon-features-content">
                                <h4>Find & Search Professional</h4>
                                {{--                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="middle-icon-features">
                        <div class="middle-icon-features-item">
                            <div class="middle-icon-large-features-box"><i class="ti-location-arrow text-warning"></i><span class="steps bg-warning">03</span></div>
                            <div class="middle-icon-features-content">
                                <h4>Book your Professional</h4>
                                {{--                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
