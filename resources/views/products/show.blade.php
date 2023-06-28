@extends('layout.app')

@push('scripts')
<script src="https://kit.fontawesome.com/c0c6839ed1.js" crossorigin="anonymous"></script>
@endpush
@section('content')
<div class="container">
    <h1><b> Detail Produk</b></h1>

    <p><b>Kode Barang :</b> {{ $product->product_code }}</p>
    <p><b> Barang :</b> {{ $product->product_name }}</p>
    <p><b> Deskripsi :</b> {{ $product->description }}</p>
    <p><b> Tanggal Awal Garansi :</b> {{ $product->warranty_start_date }}</p>
    <p><b> Tanggal Akhir Garansi :</b> {{ $product->warranty_end_date }}</p>
    <p><b>Status Garansi:</b> {{ $warrantyStatus }}</p>
    
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
