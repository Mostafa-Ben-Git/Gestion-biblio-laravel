<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = ['liver_id', "date_emprunt", 'date_retour'];

    public function liver(): BelongsTo
    {
        return $this->belongsTo(Liver::class);
    }
}
