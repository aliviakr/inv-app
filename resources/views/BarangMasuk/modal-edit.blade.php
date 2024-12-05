<!-- Modal Edit Data Masuk -->
<div class="modal fade" id="editBarangMasuk{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editBarangMasukLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangMasukLabel">Edit Data Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang-masuk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mandatory">
                        <label class="form-label" for="nama_barang">Nama Barang</label>
                        <select class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="data_barang_id">
                            <option value="">-- Pilih Nama Barang --</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }} {{ $item->id == $item->data_barang_id ? 'selected' : '' }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="jumlah_masuk">Jumlah (pcs)</label>
                        <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror" id="jumlah_masuk" name="jumlah_masuk" value="{{ $item->jumlah_masuk }}">
                        @error('jumlah_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ $item->tanggal_masuk }}">
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="total_masuk">Total (Rp)</label>
                        <input type="number" class="form-control @error('total_masuk') is-invalid @enderror" id="total_masuk" name="total_masuk" value="{{ $item->total_masuk }}">
                        @error('total_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>