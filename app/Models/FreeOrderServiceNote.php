<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeOrderServiceNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'free_order_id',
        'order_service_id',
        'notes'
    ];
    public function order() {
        return $this->belongsTo(FreeOrder::class, 'free_order_id');
    }
}