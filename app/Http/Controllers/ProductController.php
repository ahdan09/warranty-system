<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $warrantyStatuses = [];
        foreach ($products as $product) {
            $warrantyStatuses[$product->id] = $this->getWarrantyStatus($product);
        }
        return view('products.index', compact('products', 'warrantyStatuses'));
    }
    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'description' => 'required',
            'warranty_start_date' => 'required|date',
            'warranty_end_date' => 'required|date',
        ]);

        $product = Product::create($request->all());
        $product->update(['warranty_status' => $this->getWarrantyStatus($product)]);

        return redirect()->route('products.index')->with('success', "Berhasil menambah data barang!");
    }

    public function show(Product $product)
    {
        $warrantyStatus = $this->getWarrantyStatus($product);
        return view('products.show', compact('product', 'warrantyStatus'));
    }
            
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

 public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'product_name' => 'required',
            'description' => 'required',
            'warranty_start_date' => 'required|date',
            'warranty_end_date' => 'required|date',
        ]);

        $product->update($request->all());
        $product->update(['warranty_status' => $this->getWarrantyStatus($product)]);

        return redirect()->route('products.index')->with('success', 'Barang berhasil diperbarui!');
    }

    private function getWarrantyStatus(Product $product)
    {
        $today = Carbon::now();
        $warrantyStatus = '';
        if ($today >= $product->warranty_start_date && $today <= $product->warranty_end_date) {
            $warrantyStatus = 'aktif';
            $remainingTime = $today->diff($product->warranty_end_date);
            $remainingDays = $remainingTime->days;
            $remainingHours = $remainingTime->h;
            $warrantyStatus .= ' (Sisa waktu: ' . $remainingDays . ' hari ' . $remainingHours . ' jam)';
        } else {
            $warrantyStatus = 'expired';
        }
        return $warrantyStatus;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', "Berhasil menghapus product");
    }

    
}