<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocatedSlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'slot_id',
        'first_name',
        'last_name',
        'phone_no',
        'create_by',
        'edit_attempt'
    ];
}
