@extends('layouts.kasir')
@section('content') 
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">{{$page}}</h4>
                </div> 
            </div> 
            <div class="row"> 
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-0 text-center"> 
                             <img src="{{asset('assets/images/store.png')}}" style="width: 30%;">
                             <h5 class="mt-2 mb-4">Anda Login Sebagai Kasir Toko <b>{{Auth()->user()->store->name ?? ''}}</b> Di Cabang <b>{{Auth()->user()->cabang->name ?? ''}}</b> </h5> 
                        </div>
                    </div>
                </div> 
            </div> 
            
        </div>
    </div>  
@endsection 