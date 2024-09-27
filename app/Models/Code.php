<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Code extends Model
{
    use HasFactory;

    /*
     * Champs de la table 'codes' :
     *
     * - id
     * - code
     * - consumed_at
     * - host_id
     * - guest_id
     * - created_at
     * - updated_at
     */

    // Les champs remplissables par l'utilisateur
    protected $fillable = [
        'code',
        'consumed_at',
        'host_id',
        'guest_id',
    ];

    protected $casts = [
        'consumed_at' => 'timestamp',
    ];

    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guest_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
