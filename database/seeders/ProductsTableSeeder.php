<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_code' => 'P001',
            'product_name' => 'Product 1',
            'description' => 'Description of Product 1',
            'warranty_start_date' => '2023-01-01',
            'warranty_end_date' => '2024-01-01',
        ]);
    
        Product::create([
            'product_code' => 'P002',
            'product_name' => 'Product 2',
            'description' => 'Description of Product 2',
            'warranty_start_date' => '2023-02-01',
            'warranty_end_date' => '2024-02-01',
        ]);
    
    }
}
