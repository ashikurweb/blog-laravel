<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'published_at',
        'content',
        'category',
        'image'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public $timestamps = true;

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
