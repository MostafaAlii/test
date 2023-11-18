<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'buttons';
    protected $fillable = [
        'name',
        'type',
        'status',
        'typePaymernts',
        'url'
    ];

    public function statusWithLabel() {
        switch ($this->status) {
            case 0: $result = '<label class="badge badge-warning">Not Active</label>'; break;
            case 1: $result = '<label class="badge badge-success">Active</label>'; break;
        }
        return $result;
    }
}