<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'project_products')->withPivot('id','quantity');
    }
    public function productsize()
    {
        return $this->belongsTo(Size::class,'size_id');
    }
    public function productcolor()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
    public function projectstatus()
    {
        return $this->belongsTo(ProjectStatus::class,'status_id');
    }
}
