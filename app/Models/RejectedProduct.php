<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'quantity', 'grade_id'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function itemgrades()
    {
        return $this->belongsTo(ItemGrade::class,'grade_id');
    }
}
