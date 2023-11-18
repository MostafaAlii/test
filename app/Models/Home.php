<?php

namespace App\Models;

use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model {
    use HasFactory, HasImage;
    protected $table = 'homes';
    protected $fillable = [
        'title',
        'description',
        'note1',
        'note2',
        'note3',
        'note4',
        'home_compression_title',
        'home_compression_description',
        'service_title',
        'service_title_colored',
        'service_gallery_description',
    ];
}