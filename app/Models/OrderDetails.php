<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model {
    use HasFactory;
    protected $table = 'order_details';
    const NEW_ORDER = 0;
    const PAYMENT_COMPLETED = 1;
    const UNDER_PROCESS = 2;
    const FINISHED = 3;
    const REJECTED = 4;
    const CANCELED = 5;
    const REFUNDED_REQUEST = 6;
    const REFUNDED = 7;
    const RETURNED = 8;
    protected $fillable = [
        'order_id',
        'order_service_id',
        'photo_count',
        'total',
        'order_status',
        'price_offer',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function service() {
        return $this->belongsTo(OrderService::class, 'order_service_id', 'id');
    }

    public function status() {
        switch ($this->order_status) {
            case 0 :
                $result = 'new Order';
                break;
            case 1 :
                $result = 'Completed';
                break;
            case 2 :
                $result = 'process';
                break;
            case 3 :
                $result = 'finished';
                break;

            case 4 :
                $result = 'rejected';
                break;
            case 5 :
                $result = 'canceled';
                break;

            case 6 :
                $result = 'refunded request';
                break;
            case 7 :
                $result = 'refunded';
                break;

            case 8 :
                $result = 'returned';
                break;
        }
        return $result;
    }

    public function retouchService() {
        return $this->order->retouch->retouchService;
    }
}