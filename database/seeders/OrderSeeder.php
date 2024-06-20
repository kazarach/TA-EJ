<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Catalog;



class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define sample catalog, product, and customer IDs
        $catalogIds = DB::table('catalogs')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        $numberOfRelationshipsPerCatalog = 3;

        // Create sample relationships between catalogs, products, and customers
        foreach ($catalogIds as $catalogId) {
            for ($i = 0; $i < $numberOfRelationshipsPerCatalog; $i++) {
                // Pick a random product
                $productIndex = array_rand($productIds);
                // Pick a random customer
                $customerIndex = array_rand($customerIds);

                // Generate a random quantity between 1 and 10
                $quantity = rand(1, 10);

                DB::table('orders')->insert([
                    'catalog_id' => $catalogId,
                    'product_id' => $productIds[$productIndex],
                    'customer_id' => $customerIds[$customerIndex],
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Insert the same product again with a different quantity
                $additionalQuantity = rand(1, 10);

                DB::table('orders')->insert([
                    'catalog_id' => $catalogId,
                    'product_id' => $productIds[$productIndex],
                    'customer_id' => $customerIds[$customerIndex],
                    'quantity' => $additionalQuantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
