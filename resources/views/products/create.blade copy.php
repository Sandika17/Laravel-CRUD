@extends('layouts.app')

@section('content')

<h2>Tambah Product</h2>

<div class="card">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection