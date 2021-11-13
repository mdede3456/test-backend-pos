@extends('layouts.app')
@section('content')

<div class="col-xl-10">
    <div class="card">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-6 p-5">
                    <div class="mx-auto mb-5">
                        <a href="index.html">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                            <h3 class="d-inline align-middle ml-1 text-logo">TEST BACKEND</h3>
                        </a>
                    </div>

                    <h6 class="h5 mb-0 mt-4">Selamat Datang Kembali !</h6>
                    <p class="text-muted mt-1 mb-4">Silahkan Login Untuk mulai mengelola toko Anda.</p>


                    <!-- Alert Jika Terjadi Kesalahan -->
                    <x-validation-component></x-validation-component>
                    <!-- End Alert  -->


                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}" class="authentication-form">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Alamat Email</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="mail"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda Disini">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-control-label">Password</label>
                            <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">Lupa Password ?</a>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-dual" data-feather="lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda Disini">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                <label class="custom-control-label" for="checkbox-signin">Ingatkan Saya</label>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                        </div>
                    </form>
                    <!-- End Form Login -->

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

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">Belum Punya Akun ? <a href="{{route('register')}}" class="text-primary font-weight-bold ml-1">Daftar Akun</a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>
@endsection