@extends('auth.masterAuth')

@section('auth')
  <!-- Login Content -->
  <div class="d-flex flex-column mt-5 align-items-center">
    <div class="logo mb-4">
        <img src="{{ url('/assets/img/logo/school.png') }}" alt="logo-school" width="100">
    </div>
    @if (session('msg'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h6><b> Login Gagal</b></h6>
        {{session('msg')}}
      </div>
    @endif
      <div class="card shadow-lg col-lg-4">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user" action="/login" method="POST">
                    @csrf
                  <div class="form-group">
                    <input type="text" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror" name="username" id="exampleInputEmail" aria-describedby="emailHelp"
                      placeholder="Masukan Username atau NIK">
                      <x-error-validation input="username" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" placeholder="Masukan Password">
                    <x-error-validation input="password" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                </form>
                <hr>
                <div class="text-center">
                  <a class="font-weight-bold small" href="register.html">Lupa Password?</a>
                </div>
                <div class="text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- Login Content -->
