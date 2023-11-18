<?php

namespace App\Models;

use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, HasImage;
    protected $table = 'settings';
    protected $fillable =
    [
        'name',
        'phone',
        'whatsapp',
        'email',
        'facebook',
        'twitter',
        'instgram',
        'notes',
        'notes1',
        'notes2',
        'notes3',
        'notes4',
        'notes5',
        'notes6',
        'notes7',
    ];
}
