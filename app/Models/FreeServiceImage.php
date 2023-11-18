<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeServiceImage extends Model
{
    use HasFactory;
    protected $table = 'free_service_images';
    protected $fillable = [
        'free_order_id',
        'order_service_id',
        'image_path',
        'type',
    ];

    public function order() {
        return $this->belongsTo(FreeOrder::class, 'free_order_id', 'id');
    }
}