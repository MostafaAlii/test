<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany};

class Order extends Model {
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'retouch_id',
        'order_service_id',
        'slug',
    ];

    protected $casts = [
        'order_service_id' => 'json',
    ];

    public function services()
    {
        return $this->belongsTo(OrderService::class, 'order_service_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetails() : HasMany{
        return $this->hasMany(related:OrderDetails::class, foreignKey:'order_id');
    }
    public function orderDetailsOne() : HasOne{
        return $this->hasOne(related:OrderDetails::class, foreignKey:'order_id');
    }

    public function retouch() {
        return $this->belongsTo(Retouch::class, 'retouch_id');
    }

    public function serviceImages() :HasMany {
        return $this->hasMany(ServiceImage::class, 'order_id', 'id');
    }

    public function orderServiceNotes()  :HasMany {
        return $this->hasMany(OrderServiceNote::class, 'order_id');
    }

    public function typeWithLabel() {

        switch ($this->type) {
            case 'waiting' : $result = '<label class="badge badge-warning">Waiting</label>'; break;
            case 'proccess' : $result = '<label class="badge badge-primary">Processing</label>'; break;
            case 'completed' : $result = '<label class="badge badge-success">Completed</label>'; break;
        }
        return $this->type;
    }
}