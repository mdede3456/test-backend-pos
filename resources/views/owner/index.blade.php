@extends('layouts.owner')
@section('content') 
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Dashboard</h4>
                </div>
               
            </div>

            <!-- content -->
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Pemberitahuan</span>
                                    <h2 class="mb-0">{{$data['notif']}} </h2>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Kasir</span>
                                    <h2 class="mb-0">{{$data['kasir']}}</h2>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Cabang</span>
                                    <h2 class="mb-0">{{$data['cabang']}}</h2>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
 
            </div>

           

        </div>
    </div>  
@endsection

@section('scripts')
<script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
@endsection