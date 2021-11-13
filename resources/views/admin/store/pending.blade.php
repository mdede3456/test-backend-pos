@extends('layouts.admin')

@section('styles')
<link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">{{$page}}</h4>
            </div>

        </div>


        <div class="row">
            <x-validation-component></x-validation-component>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Nama Owner</th>
                                    <th>Phone Toko</th>
                                    <th>Alamat Toko</th>
                                    <th>Kota Toko</th>
                                    <th>Provinsi Toko</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($store as $n)
                                <tr id="listdata">
                                    <td>
                                        {{$n->name}}
                                        <p id="tokoid" class="d-none">{{$n->id}}</p>
                                    </td>
                                    <td>{{$n->owner->name ?? ''}}</td>
                                    <td>{{$n->phone}}</td>
                                    <td>{{$n->address}}</td>
                                    <td>{{$n->kota}}</td>
                                    <td>{{$n->provinsi}}</td>
                                    <td>{{$n->join}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success" id="{{$n->id}}" onclick="approvaltoko(this.id)"><i data-feather="check-circle"></i> Approval Toko</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#tokoapproval" class="d-none" id="approval_toko"></a>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>



    </div>
</div>

<div class="modal fade" id="tokoapproval" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Approval Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('admin.store_approval')}}" class="modal-body">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" id="tid"> 
                    <div class="col-sm-12 col-lg-6">
                        <label class="control-label">Limit Pembukaan Cabang</label>
                        <select class="form-control" name="limit">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label class="control-label">Lama Masa Aktif ( Hari )</label>
                        <input type="number" class="form-control" name="day">
                    </div>
                    <div class="col-sm-6 col-lg-6">
                    <button class="btn btn-primary mt-5" type="submit">Setujui Toko ini</button>
                    </div>
                    
                </div> 
            </form>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>
    function approvaltoko(id) {
        console.log(id);
        $("#tid").val(id);
        document.getElementById("approval_toko").click();
    }
   
</script>

<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.print.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.select.min.js')}}"></script>

<!-- Datatables init -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>


@endsection