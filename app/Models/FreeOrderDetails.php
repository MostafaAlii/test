<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeOrderDetails extends Model
{
    use HasFactory;
     const FREE_ORDER = 0;

     protected $fillable = [
        'free_order_id',
        'order_service_id',
        'photo_count',
        'total',
        'order_status',
        'price_offer',
    ];

    public function order() {
        return $this->belongsTo(FreeOrder::class, 'free_order_id');
    }

    public function service() {
        return $this->belongsTo(OrderService::class, 'order_service_id', 'id');
    }
}