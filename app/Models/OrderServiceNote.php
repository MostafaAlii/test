<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderServiceNote extends Model {
    use HasFactory;
    protected $table = 'order_service_note';
    protected $fillable = [
        'order_id',
        'order_service_id',
        'order_service_time_id',
        'notes'
    ];
    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function orderServiceTime() {
        return $this->belongsTo(OrderServiceTime::class, 'order_service_time_id');
    }
}