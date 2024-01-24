<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auteur extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "prenom"];

    public function livers(): HasMany
    {
        return $this->hasMany(Liver::class);
    }
    public function fullName()
    {
        return $this->nom . " " . $this->prenom;
    }
}
