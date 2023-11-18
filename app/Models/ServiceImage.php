<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;
    protected $table = 'service_image';
    protected $fillable = [
        'order_id',
        'order_service_id',
        'image_path',
        'type',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}