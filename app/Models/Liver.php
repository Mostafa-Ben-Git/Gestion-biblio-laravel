<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Liver extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Auteur::class);
    }
    public function emprunts(): HasMany
    {
        return $this->hasMany(Emprunt::class);
    }
}
