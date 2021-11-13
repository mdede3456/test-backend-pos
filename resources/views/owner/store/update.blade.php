@extends('layouts.owner')
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
                        <h4 class="header-title mt-0">Buat Toko</h4>
                        <p class="sub-header">
                            Silahkan Lengkapi Form dibawah ini untuk mulai membuka toko anda
                        </p>

                        <x-validation-component></x-validation-component>

                        <form action="{{route('owner.store_post')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="name">Nama Toko *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" id="name" value="{{old('name',$store->name)}}" placeholder="Nama Toko Anda">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="phone">Phone </label>
                                        <div class="col-lg-10">
                                            <input type="text" name="phone" value="{{old('phone',$store->phone)}}" id="phone" class="form-control" placeholder="Masukkan Nomor Phonsel Toko">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="address">Alamat Lengkap Toko * </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="address" rows="5" id="address">{{old('address',$store->address)}}</textarea>
                                        </div>
                                    </div>
 
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="kota">Kota</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="kota" class="form-control" id="kota" value="{{old('kota',$store->kota)}}" placeholder="Kota">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="provinsi">Provinsi</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{old('provinsi',$store->provinsi)}}" placeholder="Provinsi">
                                        </div>
                                    </div>

                                </div> 
                              
                            </div>
                            <button class="btn btn-primary text-white mt-4" type="submit">Simpan Perubahan</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div><!-- end col -->


        </div>
        <!-- row -->



    </div>
</div>
@endsection