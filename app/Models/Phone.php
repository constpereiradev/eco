<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
    ];

    //A phone belongs to a user (by default, id matching)

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
