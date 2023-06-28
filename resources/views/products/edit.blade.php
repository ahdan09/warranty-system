@extends('layout.app')

@push('scripts')
<script src="https://kit.fontawesome.com/c0c6839ed1.js" crossorigin="anonymous"></script>
@endpush

@section('content')
<div class="container">
    <h1>Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_code">Kode Barang:</label>
            <input type="text" name="product_code" value="{{ $product->product_code }}" class="form-control @error('product_code') is-invalid @enderror" required>
            @error('product_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_name">Nama Barang:</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control @error('product_name') is-invalid @enderror" required>
            @error('product_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ $product->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="warranty_start_date">Tanggal Awal Garansi:</label>
            <input type="date" name="warranty_start_date" value="{{ $product->warranty_start_date }}" class="form-control @error('warranty_start_date') is-invalid @enderror" required>
            @error('warranty_start_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="warranty_end_date">Tanggal Akhir Garansi:</label>
            <input type="date" name="warranty_end_date" value="{{ $product->warranty_end_date }}" class="form-control @error('warranty_end_date') is-invalid @enderror" required>
            @error('warranty_end_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

    
@endsection