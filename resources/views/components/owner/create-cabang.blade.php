<div class="modal fade" id="addcabang" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Cabang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($store->status == 'tidak')
                <div class="text-center">
                    <img src="{{asset('assets/images/warning.png')}}" style="width:40%">
                    <p style="font-size: 16px;">Anda belum diizinkan untuk menambahkan Cabang Toko, Silahkan Tunggu hingga Toko Anda telah diverifikasi Admin</p>
                </div>
                @elseif(count($store->cabang) >= $store->limit)
                <div class="text-center">
                    <img src="{{asset('assets/images/warning.png')}}" style="width:40%">
                    <p style="font-size: 16px;">Maaf, Limit Cabang Anda telah habis, Silahkan Minta Penambahan limit kepada admin</p> 
                </div>
                @else
                    <form class="row" method="POST" action="{{route('owner.store_cabang','create')}}">
                        @csrf
                        <div class="col-6 mb-2">
                            <label class="control-label">Nama Cabang</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="control-label">Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="control-label">Kota</label>
                            <input type="text" name="kota" class="form-control">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="control-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control">
                        </div>
                        <div class="col-12 mb-2">
                            <label class="control-label">Alamat Lengkap Cabang</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                        <div class="col-6 mt-2">
                            <button class="btn btn-primary" type="submit">Tambahkan Cabang</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>