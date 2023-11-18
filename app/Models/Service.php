<?php

namespace App\Models;

use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    use HasFactory,HasImage;
    protected $fillable = [
        'name',
        'price',
        'notes',
        'status',
        'url'
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

    public function scopeEight($query) {
        return $query->whereStatus(true)->take(10);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}