@extends('layouts.app')

@section('content')
<div class="col-xl-10">
    <div class="card">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12 p-5">
                    <div class="mx-auto mb-5">
                        <a href="index.html">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                            <h3 class="d-inline align-middle ml-1 text-logo">TEST BACKEND</h3>
                        </a>
                    </div>

                    <h6 class="h5 mb-0 mt-4">Lupa Password !</h6>
                    <p class="text-muted mt-1 mb-4">Silahkan Masukkan Email anda untuk me-reset password anda</p>


                    <!-- Alert Jika Terjadi Kesalahan -->
                    <x-validation-component></x-validation-component>
                    <!-- End Alert  -->

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="authentication-form">
                        @csrf
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

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">Kembali  <a href="{{route('login')}}" class="text-primary font-weight-bold ml-1">Login</a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection