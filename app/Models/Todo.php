<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item',
        'done',
    ];

    public function createdAt(): Attribute
    {
        return  Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d/m/Y H:i')
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
