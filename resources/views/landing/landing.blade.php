@extends('layouts.main')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('msg'))
        <div class="alert alert-success" style="margin-bottom: 0px!important;">
            <h4>{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('booked'))
        <div class="alert alert-success" style="margin-bottom: 0px!important;">
            <h4>You booking is created. Please click <a href="{{url('client-bookings')}}"><strong>here</strong></a> to check status</h4>
        </div>
    @endif
    <div class="image-cover hero-banner" style="background:url(assets/img/city.svg) no-repeat;">
        <div class="container">
            <form method="post" action="{{url('/search-result')}}">
                @csrf
                <div class="hero-search-wrap">
                    <div class="hero-search">
                        <h3>Find Best Real Estate Professionals</h3>
                    </div>
                    <div class="hero-search-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="serviceType">
                                            <option value="">Any Service Type</option>
                                            <option>Real estate agent</option>
                                            <option>Mortgage specialist</option>
                                            <option>Movers</option>
                                            <option>Home stagers</option>
                                            <option>HVAC</option>
                                            <option>Home inspectors</option>
                                        </select>
                                        <i class="ti-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="area">
                                            <option value="">All Areas of Canada</option>
                                            @foreach(\App\Places::all() as $place)
                                                <option value="{{$place->place}}">{{$place->place}}</option>
                                            @endforeach
                                        </select>
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Minimum" name="min">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Maximum" name="max">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="language">
                                            <option value="">Any Language</option>
                                            <option>English</option>
                                            <option>French</option>
                                            <option>Turkish</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                        </select>
                                        <i class="ti-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-search-action">
                        <button type="submit" class="btn search-btn">Search Result</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <section class="gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Browse All Real Estate Professionals</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($users as $user)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-listing property-2">
                            <div class="listing-img-wrapper">
                                <div class="list-img-slide">
                                    <div class="click">
                                        @if(count($user->images) == 0)
                                            <div><img src="{{asset('')}}/default.jpg" class="img-fluid mx-auto" alt="" /></div>
                                        @else
                                            @foreach($user->images as $image)
                                                <div><img src="{{url('/user-file')}}/{{$image->id}}" class="img-fluid mx-auto" alt="" /></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
{{--                                <span class="property-type">{{$user->name}}</span>--}}
                            </div>

                            <div class="listing-detail-wrapper pb-0">
                                <div class="listing-short-detail">
                                    <h4 class="listing-name">{{$user->name}}<i class="list-status ti-check"></i></h4>
                                </div>
                            </div>
                            <div class="price-features-wrapper">
                                <div class="listing-price-fx">
                                    <h6 class="listing-card-info-price price-prefix">{{$user->profile->price}}<span class="price-suffix"></span></h6>
                                </div>
                            </div>
                            <div style="padding: 30px;padding-top: 0px">
                                <div>
                                    <span class="font-weight-bold">Service : </span><span>{{$user->profile->service_type}}</span><br>
                                    <span class="font-weight-bold">Area : </span><span>{{$user->profile->area}}</span><br>
                                    <span class="font-weight-bold">Language :</span><span>{{$user->profile->language}}</span>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-3">
                                        <button class="btn btn-success btn-sm" disabled style="background: #00ba74">Contact</button>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{url('book-professional')}}/{{$user->profile->id}}" class="btn btn-success btn-sm hover-a"  style="background: #00ba74">Book Professional</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <section class="gray">
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading center">
                        <h2>Email Signup</h2>
                        <p>Email Signup to get latest updates</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12" style="margin: 0 auto; max-width: 400px">
                    <form method="post" action="{{url('email-signup')}}">
                        @csrf
                        <input type="email" required class="form-control" placeholder="enter email" name="email" >
                        <br>
                        <button class="custom-btn-logo" type="submit">Signup</button>
                    </form>

                </div>
            </div>

        </div>
    </section>






    <section class="gray">
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading center">
                        <h2>How It Works?</h2>
                        <p>How to start work with us and working process</p>
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
