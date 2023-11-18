<?php

namespace App\Models;

use App\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,HasImage;
    protected $fillable = [
        'section_id',
        'name',
        'notes',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

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

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
