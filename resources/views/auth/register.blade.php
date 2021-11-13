@extends('layouts.app')
@section('content')
<div class="col-xl-10">
    <div class="card">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-6 p-5">
                    <div class="mx-auto mb-5">
                        <a href="index.html">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                            <h3 class="d-inline align-middle ml-1 text-logo">TEST BACKEND</h3>
                        </a>
                    </div>

                    <h6 class="h5 mb-0 mt-4">Register Pengguna !</h6>
                    <p class="text-muted mt-1 mb-4">Silahkan Register untuk mulai membuka toko.</p>


                    <!-- Alert Jika Terjadi Kesalahan -->
                    <x-validation-component></x-validation-component>
                    <!-- End Alert  -->

                    <form method="POST" action="{{ route('register') }}" class="authentication-form">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap Anda">
                            </div>
                        </div>

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

                <div class="col-lg-6 d-none d-md-inline-block">
                    <div class="auth-page-sidebar">
                        <div class="overlay"></div>
                        <div class="auth-user-testimonial">
                            <p class="font-size-24 font-weight-bold text-white mb-1">TEST BACKEND</p>
                            <p class="lead">Website Ini merupakan sebuah test backend dalam pembuatan sistem POS</p>
                            <p>- Dede Hidayatullah</p>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">Sudah Punya Akun ? <a href="{{route('login')}}" class="text-primary font-weight-bold ml-1">Login</a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection