@extends('layouts.app')
@section('content')
<div class="col-xl-10">
    <div class="card">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12 p-5">
                    <div class="mx-auto mb-5">
                        <a href="index.html">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                            <h3 class="d-inline align-middle ml-1 text-logo">TEST BACKEND</h3>
                        </a>
                    </div>

                    <h6 class="h5 mb-0 mt-4">Reset Password !</h6> 


                    <!-- Alert Jika Terjadi Kesalahan -->
                    <x-validation-component></x-validation-component>
                    <!-- End Alert  -->

                    <form method="POST" action="{{ route('password.update') }}" class="authentication-form">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="form-control-label">Alamat Email</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="mail"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email Anda">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="form-control-label">Password</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password Anda">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="form-control-label">Konfirmasi Password</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="check-circle"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Anda">
                            </div>
                        </div>

                         

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit">Daftar Akun</button>
                        </div>
                    </form>
                </div>

                
            </div>

        </div> <!-- end card-body -->
    </div>
    

</div> <!-- end col -->
@endsection