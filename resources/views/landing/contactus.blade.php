@extends('layouts.main')

@section('content')

    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Contact Us</h2>
{{--                    <span class="ipn-subtitle">Lists of our all Popular agencies</span>--}}

                </div>
            </div>
        </div>
    </div>
    <section>

        <div class="container">
            @if(\Illuminate\Support\Facades\Session::has('msg'))
                <div class="alert alert-success">
                    <h4>{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                </div>
            @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h4>{{$errors->first()}}</h4>
                    </div>
                @endif
            <form action="{{url('/save-contactus')}}" method="post">
                @csrf
            <div class="row">

                    <div class="col-lg-7 col-md-7">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control simple" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control simple" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control simple" name="subject">
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control simple" name="message"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-theme" type="submit">Submit Request</button>
                        </div>

                    </div>

                <div class="col-lg-5 col-md-5">
                    <div class="contact-info">

                        <h2>Get In Touch</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-home"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Reach Us</h4>
                                2512 New Market<br> Road number<br> Canada
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Drop A Mail</h4>
                                support@marriedhome.com
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">Call Us</h4>
                                (41) 123 456 458
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            </form>
            <!-- /row -->

        </div>

    </section>
@endsection
