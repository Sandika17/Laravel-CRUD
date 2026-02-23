@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-white">
            <h5 class="mb-0 text-center">Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label small fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 text-center">
                    @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" width="80"
                            class="rounded border shadow-sm">
                    </div>
                    @endif
                    <label class="form-label small fw-bold d-block text-start">Ganti Gambar (Opsional)</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3">{{ old('description', $product->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label small fw-bold">Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', (int)$product->price) }}">
                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col">
                        <label class="form-label small fw-bold">Stok</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                            value="{{ old('stock', $product->stock) }}">
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between gap-2 border-top pt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary w-50">Batal</a>
                    <button type="submit" class="btn btn-warning w-50 fw-bold">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection