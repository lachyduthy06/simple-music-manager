<?php

namespace App\Models;

use App\Enums\CompilationStatus;
use App\Models\Scopes\OwnedByUserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

#[ScopedBy([OwnedByUserScope::class])]
class Compilation extends Model
{
    /** @use HasFactory<\Database\Factories\CompilationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'status',
        'sort',
    ];

    protected $casts = [
        'status' => CompilationStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pieces(): BelongsToMany
    {
        return $this->belongsToMany(Piece::class)
            ->withPivot('sort')
            ->orderByPivot('sort');
    }

    protected static function booted(): void
    {
        static::creating(function (Compilation $compilation) {
            // auth check, because we don't want this to run during seeding (where there's no logged-in user)
            if (Auth::check()) {
                $compilation->user_id = auth()->id();

                // Set initial sort value to 0 or MAX(sort) + 1
                $compilation->sort = (static::where('user_id', $compilation->user_id)->max('sort') ?? -1) + 1;
            }
        });
    }
}
