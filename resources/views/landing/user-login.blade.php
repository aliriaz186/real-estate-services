@extends('layouts.main')

@section('content')
    <div style="margin : 0 auto; max-width: 800px;margin-top: 50px;margin-bottom: 200px">
        <h4 class="modal-header-title">Log In</h4>
        <div class="login-form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                </div>
            @endif
            <form method="post" action="{{url('userlogin')}}" >
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-with-icon">
                        <input type="text" class="form-control" placeholder="Email Address" name="email">
                        <i class="ti-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-with-icon">
                        <input type="password" class="form-control" placeholder="*******" name="password">
                        <i class="ti-unlock"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                </div>

            </form>
        </div>
    </div>

@endsection
