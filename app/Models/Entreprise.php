<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'adresse', 'telephone', 'email_contact', 'description', 'logo'
    ];

     /**
     * Les plans associés à cette entreprise.
     */
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    /**
     * Les projets réalisés par cette entreprise.
     */
    public function projetsRealises(): HasMany
    {
        // Spécifier la clé étrangère si elle ne suit pas la convention 'entreprise_id'
        return $this->hasMany(ProjetRealise::class, 'entreprise_id');
    }

    /**
     * Les utilisateurs (Gérants) associés à cette entreprise.
     */
    public function gerants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'entreprise_user');
    }
}
