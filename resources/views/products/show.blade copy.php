@extends('layouts.app')

@section('content')

<h2>Detail Product</h2>

<div class="card">
    <p><strong>Nama:</strong> {{ $product->name }}</p>
    <div>
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
            style="width:100px; height:auto; border-radius:6px; border:1px solid #ddd;">
        @else
        <div
            style="width:100px; height:100px; background:#eee; display:flex; align-items:center; justify-content:center; border-radius:6px;">
            No Image
        </div>
        @endif
    </div>
    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Price:</strong> Rp {{ number_format($product->price, 2) }}</p>

    <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali</a>
</div>

@endsection