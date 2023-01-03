<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    public function allocated_slot(){
        return $this->hasOne(AllocatedSlot::class,'slot_id');
    }
}
