@extends('layouts.owner')

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

            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <x-validation-component></x-validation-component>

                        <form action="{{route('changeprofile')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="name">Nama Lengkap</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" id="name" value="{{old('name',Auth()->user()->name)}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="email">Alamat Email</label>
                                        <div class="col-lg-10">
                                            <input type="email" name="email" class="form-control" id="email" value="{{old('email',Auth()->user()->email)}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="jabatan">Jabatan</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{old('jabatan',Auth()->user()->jabatan)}}">
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="photo">Uploads Photo </label>
                                        <div class="col-lg-10">
                                        <input class="dropify" type="file" id="photo" name="photo" data-default-file="{{asset(Auth()->user()->photo)}}">
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <button class="btn btn-primary text-white mt-4" type="submit">Update Profil </button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div><!-- end col -->

            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <x-validation-component></x-validation-component>

                        <form action="{{route('changepassword')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="name">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" name="password" class="form-control" id="password" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="confirm">Konfirmasi Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" name="confirm" class="form-control" id="confirm">
                                        </div>
                                    </div>
                                    
                                </div>


                            </div>
                            <button class="btn btn-primary text-white mt-4" type="submit">Ganti Password </button>
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