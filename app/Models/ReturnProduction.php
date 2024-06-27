<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduction extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id', 'category_id', 'quantity', 'information', 'return_date'
    ];
    public function materials()
    {
        return $this->belongsTo(Material::class,'material_id');
    }
    public function productioncategories()
    {
        return $this->belongsTo(ReturnProductionCategory::class,'category_id');
    }
}
