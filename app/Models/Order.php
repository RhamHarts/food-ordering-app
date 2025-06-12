<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'total_amount',
        'status',
        'items' // akan menyimpan data menu yang dipesan dalam format JSON
    ];

    protected $casts = [
        'items' => 'array'
    ];
}