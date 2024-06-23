<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $fillable = [
        'production_date', 'quantity','product_id', 'project_id', 'machine_id', 'workforce_id'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function machines()
    {
        return $this->belongsToMany(Machine::class, 'production_machines');
    }

    public function workforces()
    {
        return $this->belongsToMany(Workforce::class, 'production_workforces');
    }
}
