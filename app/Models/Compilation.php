<?php

namespace App\Models;

use App\Enums\CompilationStatus;
use App\Models\Scopes\OwnedByUserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsToMany(Piece::class);
    }
}
