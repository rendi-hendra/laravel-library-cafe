<x-app-layout>
    <style>
        .form-wrapper {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
        }
    </style>

    <div class="container py-5">
        <div class="form-wrapper">
            <h2 class="form-title">Tambah Barang</h2>

            <form action="{{ route('barang.edit', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="gambarLama" value="{{ $barang->gambar }}">

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="{{ $barang->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2" required>{{ $barang->keterangan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label><br>
                    @if ($barang->id && $barang->gambar)
                        <img src="{{ asset('images/' . $barang->gambar) }}" class="mb-2 rounded shadow-sm"
                            width="120"><br>
                    @endif
                    <input class="form-control" type="file" name="gambar">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>

                </div>

                <div class="d-grid">
                    <button type="submit" name="edit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
