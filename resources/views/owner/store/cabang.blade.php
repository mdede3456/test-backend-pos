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

                        <form action="{{route('owner.store_cabang','update')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="control-label">Nama Cabang</label>
                                    <input type="hidden" name="id" value="{{$cabang->id}}">
                                    <input type="text" name="name" class="form-control" value="{{$cabang->name}}">
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="control-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" value="{{$cabang->phone}}">
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="control-label">Kota</label>
                                    <input type="text" name="kota" class="form-control" value="{{$cabang->kota}}">
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="control-label">Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" value="{{$cabang->provinsi}}">
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="control-label">Alamat Lengkap Cabang</label>
                                    <textarea class="form-control" name="address">{{$cabang->address}}</textarea>
                                </div>
                                <div class="col-6 mt-2">
                                    <button class="btn btn-primary" type="submit">Simpan Perubahan Cabang</button>
                                </div>
                            </div> 
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div><!-- end col -->


        </div>
        <!-- row -->



    </div>
</div>
@endsection