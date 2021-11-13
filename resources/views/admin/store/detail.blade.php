@extends('layouts.admin')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Data Toko</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$page}}</li>
                        <x-validation-component></x-validation-component>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">{{$page}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <img src="{{asset('assets/images/store.png')}}" alt="" class="avatar-lg rounded-circle" />
                            <h5 class="mt-2 mb-0">{{$store->name}}</h5>
                            <h6 class="text-muted font-weight-normal mt-2 mb-0">
                                @if($store->status == 'active')
                                <span class="badge bg-primary text-white">Aktiv</span>
                                @else
                                <span class="badge bg-danger text-white">Non Aktif</span>
                                @endif
                            </h6>


                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addlimit" class="btn btn-primary btn-sm mr-1 mt-3">Tambah Limit</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addactive" class="btn btn-primary btn-sm mr-1 mt-3">Tambah Masa Aktif</a>
                        </div>

                        <!-- profile  -->
                        <div class="mt-5 pt-2 border-top">
                            <h4 class="mb-3 font-size-15">Alamat Lengkap Toko</h4>
                            <p class="text-muted mb-4">{{$store->address}}</p>
                        </div>
                        <div class="mt-3 pt-2 border-top">
                            <h4 class="mb-3 font-size-15">Informasi Lainnya</h4>
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0 text-muted">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>{{$store->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kota</th>
                                            <td>{{$store->kota}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provinsi</th>
                                            <td>{{$store->provinsi}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Join</th>
                                            <td>{{$store->join}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Limit Cabang</th>
                                            <td>{{$store->limit}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Masa Aktif</th>
                                            <td>{{$store->masa_active}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end card -->

            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                    Aktivitas Toko
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                    Cabang
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">

                                <div class="left-timeline mt-3 mb-3 pl-4">
                                    <ul class="list-unstyled events mb-0">
                                        @foreach ($store->aktivitas->take(20) as $a)
                                        <li class="event-list">
                                            <div class="pb-4">
                                                <div class="media">
                                                    <div class="event-date text-center mr-4">
                                                        <div class="bg-soft-primary p-1 rounded text-primary font-size-14"> {{$a->created_at}}</div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="font-size-15 mt-0 mb-1">{{$a->name}}</h6>
                                                        <p class="text-muted font-size-14">{{$a->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>


                            </div>

                            <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                                <h5 class="mt-3">Daftar Cabang Toko</h5>

                                <div class="row mt-3">
                                @foreach ($store->cabang as $c) 
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="badge badge-success float-right">Aktiv</div>
                                                <p class="text-success text-uppercase font-size-12 mb-2">{{$c->created_at}}</p>
                                                <h5><a href="#" class="text-dark">{{$c->name}} </a>
                                                </h5>
                                                <p class="text-muted mb-4">{{$c->kota}}, {{$c->provinsi}}, {{$c->address}}  </p> 
                                            </div>
                                            <div class="card-body border-top">
                                                <div>
                                                    <div>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item pr-2">
                                                                <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Due date">
                                                                    <i class="uil uil-calender mr-1"></i><b>100</b> Jumlah Transaksi
                                                                </a>
                                                            </li> 
                                                        </ul>
                                                    </div>
                                                    <div class="pt-2">
                                                        <div class="progress" style="height: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="100% completed">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end row -->
                            </div>


                        </div>

                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->

</div> <!-- content -->

<div class="modal fade" id="addlimit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Limit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.add_limit')}}" method="POST" class="modal-body">
                @csrf
                <label class="control-labe">Nominal Penambahan Limit</label>
                <input type="hidden" name="id" value="{{$store->id}}">
                <input type="number" name="limit" class="form-control" min="1" value="1">

                <button class="btn btn-primary mt-4" type="submit">Tambahkan Limit</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addactive" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Masa Aktive</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.add_active')}}" method="POST" class="modal-body">
                @csrf
                <label class="control-labe">Hari penambahan masa aktive ? </label>
                <input type="hidden" name="id" value="{{$store->id}}">
                <input type="number" name="day" class="form-control" min="1" value="1">

                <button class="btn btn-primary mt-4" type="submit">Tambahkan Masa Aktif</button>
            </form>
        </div>
    </div>
</div>
@endsection