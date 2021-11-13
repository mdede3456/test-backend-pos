@extends('layouts.admin')
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

                        <form action="{{route('admin.buattoko')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="name">Nama Toko *</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Nama Toko Anda">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="phone">Phone </label>
                                        <div class="col-lg-10">
                                            <input type="text" name="phone" value="{{old('phone')}}" id="phone" class="form-control" placeholder="Masukkan Nomor Phonsel Toko">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="address">Alamat Lengkap Toko * </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="address" rows="5" id="address">{{old('address')}}</textarea>
                                        </div>
                                    </div>
 
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="kota">Kota</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="kota" class="form-control" id="kota" value="{{old('kota')}}" placeholder="Kota">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="provinsi">Provinsi</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{old('provinsi')}}" placeholder="Provinsi">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="limit">Limit Buka Cabang</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="limit" class="form-control" id="limit" value="{{old('limit')}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="day">Masa Aktif</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="day" class="form-control" id="day" value="{{old('day')}}" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="provinsi">Pengguna</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="user_id" >
                                                <option value="">Pilih Owner</option>
                                                @foreach ($user as $u)
                                                    <option value="{{$u->id}}">{{$u->name}} - {{$u->email}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div> 
                              
                            </div>
                            <button class="btn btn-primary text-white mt-4" type="submit">Buat Toko</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div><!-- end col -->


        </div>
        <!-- row -->



    </div>
</div>
@endsection