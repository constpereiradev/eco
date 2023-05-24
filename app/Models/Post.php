<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
