<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Retouch extends Model {
    use HasFactory;
    protected $table = 'retouches';
    protected $fillable = [
        'retouch_service_id',
        'retouching_note',
        'user_id',
    ];

    public function retouchService(): BelongsTo {
        return $this->belongsTo(RetouchService::class, 'retouch_service_id');
    }
}