@extends('layouts.master')

@section('title','Login')

@section('body')

<body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ url('/') }}">
            <img src="{{ asset(\App\Configuration::where('key','logo')->first()->value) }}" width="250px" height="53px" />
          </a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Login</p>
           @include('layouts.alert')
          <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="input-group mb-3" id="username">
              <input type="text" class="form-control" name="username" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3" id="password">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <a href="{{ url('/register') }}" class="text-center">Register</a>
                <p><a href="{{ url('/forgot_password') }}" class="text-center">Forgot Password ?</a></p>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
<!-- /.login-box -->

@endsection
