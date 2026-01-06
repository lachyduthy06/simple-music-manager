<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Piece extends Model
{
    /** @use HasFactory<\Database\Factories\PieceFactory> */
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'name',
        'artist',
        'lyrics_link',
        'tutorial_link',
        'notes',
        'sort',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function compilations(): BelongsToMany
    {
        return $this->belongsToMany(Compilation::class);
    }
}
