<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'maintenance',
        'cost',
        'date',
        'duration',
        'technician_name',
        'created_at',
        'updated_at',
        'card_id'
    ];
}
