@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<div class="card">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        {{-- Gambar Lama --}}
        <div class="form-group">
            <label>Gambar Saat Ini</label><br>
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="120"
                style="border:1px solid #ddd; border-radius:6px;">
            @else
            <div
                style="width:100px; height:100px; background:#eee; display:flex; align-items:center; justify-content:center; border-radius:6px;">
                No Image
            </div>
            @endif
        </div>

        {{-- Upload Gambar Baru --}}
        <div class="form-group">
            <label>Ganti Gambar</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

@endsection