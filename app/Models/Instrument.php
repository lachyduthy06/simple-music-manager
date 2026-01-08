<?php

namespace App\Models;

use App\Models\Scopes\OwnedByUserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy([OwnedByUserScope::class])]
class Instrument extends Model
{
    /** @use HasFactory<\Database\Factories\InstrumentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'sort',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }

    protected static function booted(): void
    {
        static::creating(function (Instrument $instrument) {
            // Set initial sort value to the MAX(sort) + 1 (if it hasn't been set already)
            $instrument->sort ??= static::where('user_id', $instrument->user_id)->max('sort') + 1;
            // this also works with no instruments existing (because "null + 1" is "1")

            $instrument->user_id = auth()->id();
        });
    }
}
