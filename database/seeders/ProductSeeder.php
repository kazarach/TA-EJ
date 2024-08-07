<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use App\Models\Color;
use App\Models\Type;
use App\Models\Sign;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $sizes = Size::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();
        $colors = Color::pluck('id')->toArray();
        $types = Type::pluck('id')->toArray();
        $signs = Sign::pluck('id')->toArray();

        $products = [
            [
                'name' => 'Kerudung Bergo',
                'code' => 'KRDBG01',
                'selling_price' => 7000,
                'stock' => 20,
            ],
            [
                'name' => 'Gamis Pria Merah',
                'code' => 'GMSPR01',
                'selling_price' => 9000,
                'stock' => 10,
            ],
            [
                'name' => 'Gamis Wanita Putih',
                'code' => 'GMSWT01',
                'selling_price' => 9000,
                'stock' => 15,
            ],
            [
                'name' => 'Kerudung Segi Empat',
                'code' => 'KRDSG01',
                'selling_price' => 8000,
                'stock' => 25,
            ],
            [
                'name' => 'Gamis Anak Biru',
                'code' => 'GMSAN01',
                'selling_price' => 7000,
                'stock' => 30,
            ],
            [
                'name' => 'Koko Dewasa Hitam',
                'code' => 'KKDHT01',
                'selling_price' => 10000,
                'stock' => 12,
            ],
            [
                'name' => 'Kerudung Instan Anak',
                'code' => 'KRDIN01',
                'selling_price' => 6000,
                'stock' => 18,
            ],
            [
                'name' => 'Gamis Dewasa Hijau',
                'code' => 'GMSDH01',
                'selling_price' => 11000,
                'stock' => 22,
            ],
            [
                'name' => 'Koko Anak Putih',
                'code' => 'KKANP01',
                'selling_price' => 5000,
                'stock' => 16,
            ],
            [
                'name' => 'Gamis Dewasa Kuning',
                'code' => 'GMSDK01',
                'selling_price' => 12000,
                'stock' => 20,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'size_id' => $sizes[array_rand($sizes)],
                'category_id' => $categories[array_rand($categories)],
                'color_id' => $colors[array_rand($colors)],
                'type_id' => $types[array_rand($types)],
                'sign_id' => $signs[array_rand($signs)],
                'code' => $product['code'],
                'purchase_price' => 0,
                'selling_price' => $product['selling_price'],
                'stock' => $product['stock'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
