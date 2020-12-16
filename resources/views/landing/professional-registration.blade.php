@extends('layouts.main')

@section('content')
    <div style="margin : 0 auto; max-width: 800px;margin-top: 50px;margin-bottom: 250px">
        <h4 class="text-center">We need some more info as you are professional</h4>
        <div class="login-form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                </div>
            @endif
            <form method="post" action="{{url('save-professional-registration')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">What type of services are you providing?</label>
                            <div >
                               <select class="form-control" name="serviceType">
                               <option value="">Select Service Type</option>
                               <option>Real estate agent</option>
                               <option>Mortgage specialist</option>
                               <option>Movers</option>
                               <option>Home stagers</option>
                               <option>HVAC</option>
                               <option>Home inspectors</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">What is your area of service?</label>
{{--                            <div >--}}
{{--                               <input type="text" class="form-control" name="area">--}}
{{--                            </div>--}}
                            <div>
                                <select class="form-control" name="area">
                                    <option value="">Select Area</option>
                                    @foreach(\App\Places::all() as $place)
                                        <option value="{{$place->place}}">{{$place->place}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">What is your price in USD?</label>
                            <div >
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">What is your language?</label>
                            <div>
                                <div>
                                    <select class="form-control" name="language">
                                        <option value="">Select Language</option>
                                        <option>English</option>
                                        <option>French</option>
                                        <option>Turkish</option>
                                        <option>Hindi</option>
                                        <option>Urdu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Please upload Portfolio images here</label>
                            <p class="text-warning" style="font-size: 12px">You can upload multiple images by holding CTRL while selecting</p>
                            <div >
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md full-width pop-login">Proceed</button>
                </div>

            </form>
        </div>
    </div>
@endsection
