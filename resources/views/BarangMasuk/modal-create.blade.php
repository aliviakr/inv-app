<!-- Modal Tambah Data Barang Masuk -->
<div class="modal fade" id="tambahBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="tambahBarangMasukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangMasukLabel">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang-masuk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mandatory">
                        <label class="form-label" for="nama_barang">Nama Barang</label>
                        <select class="form-control select2me @error('nama_barang') is-invalid @enderror" id="nama_barang" name="data_barang_id">
                            <option value="">-- Pilih Nama Barang --</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_masuk">Harga Satuan</label>
                        <input type="number" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" name="harga_masuk">
                        @error('harga_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="jumlah">Jumlah (pcs)</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah_masuk">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk">
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="total_masuk">Total (Rp)</label>
                        <input type="number" class="form-control @error('total_masuk') is-invalid @enderror" id="total_masuk" name="total_masuk" readonly>
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
<!-- End Modal -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('tanggal_masuk');

        if (!tanggalInput.value) { // Cek jika belum ada nilai di input
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const dd = String(today.getDate()).padStart(2, '0'); 
            tanggalInput.value = `${yyyy}-${mm}-${dd}`; // Format YYYY-MM-DD
        }


        const jumlahInput = document.getElementById('jumlah');
        const hargaInput = document.getElementById('harga_masuk');
        const totalInput = document.getElementById('total_masuk');

        function calculateTotal() {
            const jumlah = parseFloat(jumlahInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;
            const total = jumlah * harga;
            totalInput.value = total;
        }

        jumlahInput.addEventListener('input', calculateTotal);
        hargaInput.addEventListener('input', calculateTotal);
    });
</script>