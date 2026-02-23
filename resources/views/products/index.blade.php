@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Produk</h5>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                        <tr class="align-middle">
                            <td class="text-center">{{ $products->firstItem() + $index }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="50" class="rounded">
                                @else
                                <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->stock }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-sm btn-info text-white">Detail</a>

                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data produk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">
                    Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari {{ $products->total() }} produk
                </small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        {{-- Tombol Sebelumnya --}}
                        <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}">«</a>
                        </li>

                        {{-- Nomor Halaman --}}
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        {{-- Tombol Berikutnya --}}
                        <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection