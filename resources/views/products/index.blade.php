
@extends('layout.app')

@section('content')

<h1>Daftar Produk</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

<table id="product-table" class="table">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Status Garansi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $warrantyStatuses[$product->id] }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    @csrf
                    @method('delete')
                    <button type="submit" value="delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>                
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection