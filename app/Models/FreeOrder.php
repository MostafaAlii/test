<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany};
class FreeOrder extends Model
{
    use HasFactory;
    protected $table = 'free_orders';
    protected $fillable = [
        'order_service_id',
        'slug',
        'type',
        'name',
        'email',
        'website',
    ];

    protected $casts = [
        'order_service_id' => 'json',
    ];

    public function services() {
        return $this->belongsTo(OrderService::class, 'order_service_id');
    }

    public function freeOrderDetails() : HasMany{
        return $this->hasMany(related:FreeOrderDetails::class, foreignKey:'free_order_id');
    }

    public function freeOrderDetailsOne() : HasOne{
        return $this->hasOne(related:FreeOrderDetails::class, foreignKey:'free_order_id');
    }

    public function freeServiceImages() :HasMany {
        return $this->hasMany(FreeServiceImage::class, 'free_order_id', 'id');
    }

    public function FreerderServiceNotes()  :HasMany {
        return $this->hasMany(FreeOrderServiceNote::class, 'free_order_id');
    }
}