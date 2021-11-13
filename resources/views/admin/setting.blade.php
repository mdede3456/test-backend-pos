@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">{{$page}}</h4>
            </div>

        </div>


        <!-- stats + charts -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-validation-component></x-validation-component>

                        <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="app_name">Nama Aplikasi *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="app_name" class="form-control" id="app_name" value="{{old('app_name',$settings->app_name)}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="phone">Notifikasi Email </label>
                                        <div class="col-lg-10">
                                            <input type="email" name="mail_notif" value="{{old('mail_notif',$settings->mail_notif)}}" id="phone" class="form-control" placeholder="Masukkan Nomor Phonsel Toko">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="address">Uploads Logo </label>
                                        <div class="col-lg-10">
                                        <input class="dropify" type="file" id="logo" name="logo" data-default-file="{{asset($settings->logo)}}">
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <button class="btn btn-primary text-white mt-4" type="submit">Simpan Pengaturan</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div><!-- end col -->


        </div>
        <!-- row -->



    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
<script>
     $(".dropify").dropify();
</script>
@endsection