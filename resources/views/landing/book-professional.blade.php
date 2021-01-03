@extends('layouts.main')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-danger" style="margin-bottom: 0px!important;">
            <h4>{{\Illuminate\Support\Facades\Session::get("error")}}</h4>
        </div>
    @endif

    <section class="gray">
        <div class="container">

            <div>
                <div>
                    <div>
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
                        </div>
                        <div >
                            <div style="padding: 15px;background: #CAE7DD" >
                                <div class="row">
                                    @if(count($professional->images) == 0)
                                        <div class="col-md-4"><img src="{{asset('')}}/default.jpg" class="img-fluid mx-auto" alt=""  style="width: 300px;height: 300px"/></div>
                                    @else
                                        @foreach($professional->images as $image)
                                            <div class="col-md-4"><img src="{{url('/user-file')}}/{{$image->id}}" class="img-fluid mx-auto"  style="width: 300px;height: 300px" alt="" /></div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        {{--                                <span class="property-type">{{$user->name}}</span>--}}
                    </div>
                </div>
                <div style="margin-top: 20px">
                    <form method="post" action="{{url('book-professional')}}">
                        @csrf
                        <label>Write down instructions : </label>
                        <input type="hidden" value="{{$professional->id}}" name="professional_id">
                        <textarea type="text" name="instructions" class="form-control" placeholder="write here..."></textarea>
                        <br>
                        <button class="custom-btn-logo-full-width" type="submit">Book {{$professional->user->name}}</button>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
