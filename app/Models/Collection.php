<?php

namespace App\Models;

use App\Models\Scopes\OwnedByUserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy([OwnedByUserScope::class])]
class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instrument_id',
        'name',
        'sort',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class);
    }

    public function pieces(): HasMany
    {
        return $this->hasMany(Piece::class);
    }
}
