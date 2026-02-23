@extends('layouts.app')

@section('content')

<h2>Data Product</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('products.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Product</a>

<table class="table">
    <tr>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="80">
            @else
            No Image
            @endif
        <td>{{ $product->stock }}</td>
        <td>Rp {{ number_format($product->price, 2) }}</td>
        <td>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Detail</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection