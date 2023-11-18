<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderService extends Model {
    use HasFactory;
    protected $table = 'order_services';
    protected $fillable = [
        'name',
        'price',
        'status',
    ];

    public function statusWithLabel() {
        switch ($this->status) {
            case 0: $result = '<label class="badge badge-warning">Not Active</label>'; break;
            case 1: $result = '<label class="badge badge-success">Active</label>'; break;
        }
        return $result;
    }

    public function scopeActive($query) {
        return $query->whereStatus(true);
    }
}