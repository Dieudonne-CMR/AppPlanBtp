<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes'; // Spécifier le nom de la table

    protected $fillable = ['nom', 'pays_id'];

    /**
     * Le pays auquel cette ville appartient.
     */
    public function pays(): BelongsTo
    {
        return $this->belongsTo(Pays::class);
    }

    /**
     * Les entreprises situées dans cette ville.
     */
    public function entreprises(): HasMany
    {
        return $this->hasMany(Entreprise::class);
    }
}
