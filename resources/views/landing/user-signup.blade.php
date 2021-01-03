@extends('layouts.main')

@section('content')
    <div style="margin : 0 auto; max-width: 800px;margin-top: 50px;margin-bottom: 200px">
        <h4 class="modal-header-title">Sign Up</h4>

        <div class="login-form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                </div>
            @endif
            <form method="post" action="{{url('usersignup')}}">
                @csrf
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <i class="ti-email"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="password" class="form-control" placeholder="*******" name="password">
                                <i class="ti-unlock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="+123 546 5847" name="phone">
                                <i class="lni-phone-handset"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <select class="form-control" name="userType">
                                    <option value="customer" selected>I am a client</option>
                                    <option value="professional">I am a professional</option>
                                </select>
                                <i class="ti-briefcase"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                </div>

            </form>
        </div>
    </div>

@endsection
