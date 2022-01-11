<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'path'];

    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
