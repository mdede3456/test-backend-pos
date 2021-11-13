@extends('layouts.app')

@section('content')
<div class="col-xl-5 col-lg-6 col-md-8">
    <div class="card">
        <div class="card-body p-4">
            <div class="text-center">
                <div class="mx-auto">
                    <a href="index.html">
                        <img src="assets/images/logo.png" alt="" height="24" />
                        <h3 class="d-inline align-middle ml-1 text-logo">TEST BACKEND</h3>
                    </a>
                </div>

                <h6 class="h5 mb-0 mt-5">Berhasil Register</h6>
                <p class="text-muted mt-3 mb-3">Silahkan Konfirmasi Alamat Email Anda untuk mulai mengaktifkan akun Anda </p>
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif
            </div>
        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <p class="text-muted">Minta Kembali Email Verifikasi <button type="submit" class="btn btn-sm btn-primary">Minta Kembali</button></p>
            </form>

            <p class="text-muted">Logout dan kembali Register <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-primary">Minta Kembali</a></p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection