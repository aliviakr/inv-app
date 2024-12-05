<!-- Modal Edit Data Barang -->
<div class="modal fade" id="editBarang{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editBarangLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mandatory">
                        <label class="form-label" for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="kategori_id">Kategori</label>
                        <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }} {{ $item->id == $item->kategori_id ? 'selected' : '' }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                     <!-- <div class="form-group mandatory">
                        <label class="form-label" for="stok">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ $item->stok }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_masuk">Harga Masuk</label>
                        <input type="text" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" name="harga_masuk" value="{{ $item->harga_masuk }}">
                        @error('harga_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_keluar">Harga Keluar</label>
                        <input type="text" class="form-control @error('harga_keluar') is-invalid @enderror" id="harga_keluar" name="harga_keluar" value="{{ $item->harga_keluar }}">
                        @error('harga_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>