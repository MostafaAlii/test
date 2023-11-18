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
    ];
}
