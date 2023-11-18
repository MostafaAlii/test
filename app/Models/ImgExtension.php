<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ImgExtension extends Model {
    use HasFactory;
    protected $table = 'img_extensions';
    protected $fillable = [
        'ext',
        'description',
    ];
}