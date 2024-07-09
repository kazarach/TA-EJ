<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'category_id', 'quantity', 'information', 'return_date', 'grade_id'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customercategories()
    {
        return $this->belongsTo(ReturnCustomerCategory::class,'category_id');
    }
    public function itemgrades()
    {
        return $this->belongsTo(ItemGrade::class,'grade_id');
    }

}
