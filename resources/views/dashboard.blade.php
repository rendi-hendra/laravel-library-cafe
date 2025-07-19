<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="barang_form.php" class="btn btn-primary mt-2">
                <i class="bi bi-plus-circle"></i> Tambah Barang
            </a>
        </div>
        @if ($barangs->count() > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-5 pb-2 mt-3">
                @foreach ($barangs as $barang)
                    <div class="col mb-4">
                        <div class="card h-100 border-0 hover-shadow shadow-sm">
                            <img src="{{ asset('images/' . $barang->gambar) }}" alt="{{ $barang->nama }}"
                                class="card-img-top rounded-top object-fit-cover"
                                style="height: 180px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $barang->nama }}</h5>
                                <p class="card-text small text-muted">{{ $barang->keterangan }}</p>
                                <p class="card-text fw-bold">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}<br>
                                    <span class="text-secondary fw-normal">Stok: {{ $barang->stok }}</span>
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ url("barang/$barang->id/edit") }}"
                                        class="btn btn-outline-primary btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                        class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                            data-id="{{ $barang->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                    <button class="btn btn-outline-primary w-100 btn-buy" data-id="{{ $barang->id }}">
                                        <i class="bi bi-cart-plus"></i> Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                <nav>
                    <ul class="pagination">
                        @if ($page > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $page - 1 }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $total_pages; $i++)
                            <li class="page-item {{ $i === $page ? 'active' : '' }}">
                                <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($page < $total_pages)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $page + 1 }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @else
            <div class="alert alert-warning mt-4">Tidak ada barang.</div>
        @endif
    </div>

    <!-- SweetAlert -->
    <script>
        document.querySelectorAll('.btn-buy').forEach(button => {
            button.addEventListener('click', function(e) {
                const id = this.dataset.id;

                fetch(`src/keranjang/keranjang_create.php?id=${id}`)
                    .then(res => {
                        if (!res.ok) throw new Error("Gagal menambahkan ke keranjang");
                        return res.text(); // atau .json jika responnya json
                    })
                    .then(data => {
                        Toastify({
                            text: "Barang berhasil ditambahkan ke keranjang!",
                            duration: 3000,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#28a745",
                            stopOnFocus: true
                        }).showToast();
                    })
                    .catch(error => {
                        Swal.fire('Error', error.message, 'error');
                    });
            });
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Yakin mau hapus?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then(result => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
