@extends('layouts.main')

@section('content')


    <section class="gray">
        <div class="container">

            <form method="post" action="{{url('/search-result')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-heading center">
                            <h2>Search Results</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="serviceType">
                                            <option value="">Any Service Type</option>
                                            <option {{$filters->serviceType == 'Real estate agent' ? 'selected' : ''}}>Real estate agent</option>
                                            <option {{$filters->serviceType == 'Mortgage specialist' ? 'selected' : ''}}>Mortgage specialist</option>
                                            <option {{$filters->serviceType == 'Movers' ? 'selected' : ''}}>Movers</option>
                                            <option {{$filters->serviceType == 'Home stagers' ? 'selected' : ''}}>Home stagers</option>
                                            <option {{$filters->serviceType == 'HVAC' ? 'selected' : ''}}>HVAC</option>
                                            <option {{$filters->serviceType == 'Home inspectors' ? 'selected' : ''}}>Home inspectors</option>
                                        </select>
                                        <i class="ti-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="area">
                                            <option value="">All Areas of Canada</option>
                                            @foreach(\App\Places::all() as $place)
                                                <option {{$filters->area == $place->place ? 'selected' : ''}} value="{{$place->place}}">{{$place->place}}</option>
                                            @endforeach
                                        </select>
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Minimum" name="min" value="{{$filters->min ?? ''}}">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Maximum" name="max" value="{{$filters->max ?? ''}}">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select class="form-control" name="language">
                                            <option value="">Any Language</option>
                                            <option {{$filters->language == 'English' ? 'selected' : ''}}>English</option>
                                            <option {{$filters->language == 'French' ? 'selected' : ''}}>French</option>
                                            <option {{$filters->language == 'Turkish' ? 'selected' : ''}}>Turkish</option>
                                            <option {{$filters->language == 'Hindi' ? 'selected' : ''}}>Hindi</option>
                                            <option {{$filters->language == 'Urdu' ? 'selected' : ''}}>Urdu</option>
                                        </select>
                                        <i class="ti-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-search-action">
                        <button type="submit" class="btn search-btn">Apply Filters</button>
                    </div>
                </div>
            </form>


            <div class="row">
                @foreach($professionals as $professional)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-listing property-2">
                            <div class="listing-img-wrapper">
                                <div class="list-img-slide">
                                    <div class="click">
                                        @if(count($professional->images) == 0)
                                            <div><img src="{{asset('')}}/default.jpg" class="img-fluid mx-auto" alt="" /></div>
                                        @else
                                            @foreach($professional->images as $image)
                                                <div><img src="{{url('/user-file')}}/{{$image->id}}" class="img-fluid mx-auto" alt="" /></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                {{--                                <span class="property-type">{{$user->name}}</span>--}}
                            </div>

                            <div class="listing-detail-wrapper pb-0">
                                <div class="listing-short-detail">
                                    <h4 class="listing-name">{{$professional->user->name}}<i class="list-status ti-check"></i></h4>
                                </div>
                            </div>
                            <div class="price-features-wrapper">
                                <div class="listing-price-fx">
                                    <h6 class="listing-card-info-price price-prefix">{{$professional->price}}<span class="price-suffix"></span></h6>
                                </div>
                            </div>
                            <div style="padding: 30px;padding-top: 0px">
                                <div>
                                    <span class="font-weight-bold">Service : </span><span>{{$professional->service_type}}</span><br>
                                    <span class="font-weight-bold">Area : </span><span>{{$professional->area}}</span><br>
                                    <span class="font-weight-bold">Language :</span><span>{{$professional->language}}</span>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-3">
                                        <button class="btn btn-success btn-sm" disabled style="background: #00ba74">Contact</button>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{url('book-professional')}}/{{$professional->id}}" class="btn btn-success btn-sm hover-a"  style="background: #00ba74">Book Professional</a>
{{--                                        <button class="btn btn-success btn-sm" disabled style="background: #00ba74">Book Professional</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
