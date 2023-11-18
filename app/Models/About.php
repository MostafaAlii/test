<?php

namespace App\Models;
use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class About extends Model
{
    use HasFactory, HasImage;
    protected $table = 'abouts';
    protected $fillable = [
        'name',
        'note1',
        'note2',
    ];
}