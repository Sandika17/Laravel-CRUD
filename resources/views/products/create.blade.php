@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-white">
            <h5 class="mb-0">Form Tambah Produk</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Gambar</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label small fw-bold">Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}">
                    </div>
                    <div class="col">
                        <label class="form-label small fw-bold">Stok</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                            value="{{ old('stock') }}">
                    </div>
                </div>

                <div class="d-flex justify-content-between gap-2 border-top pt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary w-50">Kembali</a>
                    <button type="submit" class="btn btn-primary w-50">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection