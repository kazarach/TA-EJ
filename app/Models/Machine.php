<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    public function machineuse()
    {
        return $this->belongsTo(MachineUse::class,'use_id');
    }
    public function machinestatus()
    {
        return $this->belongsTo(MachineStatus::class,'status_id');
    }
}
