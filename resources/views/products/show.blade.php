@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border mx-auto" style="max-width: 800px;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-secondary">Detail Produk</h5>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body p-4">
            <div class="row g-4 align-items-center">
                <div class="col-md-5">
                    @if($product->image)
                    <div class="img-container rounded border p-2 bg-light text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                            style="max-height: 300px; object-fit: contain;" alt="{{ $product->name }}">
                    </div>
                    @else
                    <div class="bg-light rounded border d-flex align-items-center justify-content-center"
                        style="height: 250px;">
                        <div class="text-center">
                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted small mb-0">Tidak ada gambar</p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <h2 class="fw-bold text-dark mb-1">{{ $product->name }}</h2>
                    <h3 class="text-success fw-bold mb-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h3>

                    <hr class="text-muted opacity-25">

                    <div class="mb-3 d-flex align-items-center">
                        <div class="text-muted small me-3" style="width: 100px;">Status Stok</div>

                        <div>
                            @if($product->stock > 0)
                            <span class="badge bg-success-subtle text-success border border-success-subtle">
                                Tersedia: {{ $product->stock }} Unit
                            </span>
                            @else
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                Stok Habis
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-secondary small d-block mb-1">Deskripsi Produk</label>
                        <p class="text-muted" style="line-height: 1.6; font-size: 0.95rem;">
                            {{ $product->description ?? 'Deskripsi belum ditambahkan untuk produk ini.' }}
                        </p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning fw-bold py-2">
                            <i class="bi bi-pencil-square"></i> Edit Informasi Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection