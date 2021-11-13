@extends('layouts.admin')
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
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Toko</span>
                                    <h2 class="mb-0">{{$data['toko']}}</h2>
                                </div>
                                <div class="align-self-center">
                                    <div id="today-revenue-chart" class="apex-charts"></div>
                                    <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 10.21%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Cabang</span>
                                    <h2 class="mb-0">{{$data['cabang']}}</h2>
                                </div>
                                <div class="align-self-center">
                                    <div id="today-product-sold-chart" class="apex-charts"></div>
                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Owner</span>
                                    <h2 class="mb-0">{{$data['owner']}}</h2>
                                </div>
                                <div class="align-self-center">
                                    <div id="today-new-customer-chart" class="apex-charts"></div>
                                    <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> 25.16%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Kasir</span>
                                    <h2 class="mb-0">{{$data['kasir']}}</h2>
                                </div>
                                <div class="align-self-center">
                                    <div id="today-new-visitors-chart" class="apex-charts"></div>
                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> 5.05%</span>
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