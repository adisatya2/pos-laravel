<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal" id="myForm">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <label for="nama_produk" class="col-md-2 offset-1 control-label text-right col-form-label">Nama
                            Produk</label>
                        <div class="col-md-8">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori"
                            class="col-md-2 offset-1 control-label text-right col-form-label">Kategori</label>
                        <div class="col-md-8">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategori as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk"
                            class="col-md-2 offset-1 control-label text-right col-form-label">Merk</label>
                        <div class="col-md-8">
                            <textarea name="merk" id="merk" class="form-control"></textarea>
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-md-2 offset-1 control-label text-right col-form-label">Harga
                            Beli</label>
                        <div class="col-md-8">
                            <input type="number" name="harga_beli" id="harga_beli" class="form-control">
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-md-2 offset-1 control-label text-right col-form-label">Harga
                            Jual</label>
                        <div class="col-md-8">
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon"
                            class="col-md-2 offset-1 control-label text-right col-form-label">Diskon</label>
                        <div class="col-md-8">
                            <input type="number" name="diskon" id="diskon" class="form-control">
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok"
                            class="col-md-2 offset-1 control-label text-right col-form-label">Stok</label>
                        <div class="col-md-8">
                            <input type="number" name="stok" id="stok" class="form-control" required>
                            <span class="help-block with-errors" style="color:red"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary btn-sm btn-flat" form="myForm">Simpan</button>
            </div>
        </div>
    </div>
</div>
