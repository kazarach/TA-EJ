<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'product_id', 'quantity', 'catalog_id'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function catalogs()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
