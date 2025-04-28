<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'adresse', 
        'telephone', 
        'email_contact', 
        'description', 
        'logo',
        'ville_id', // Ajout de la ville_id pour la relation avec la ville
        'pays_id', // Ajoutez cette ligne !
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

       /**
     * La ville où est située l'entreprise.
     */
    public function ville(): BelongsTo // Nouvelle relation
    {
        return $this->belongsTo(Ville::class);
    }

    /**
     * Raccourci pratique pour obtenir le pays de l'entreprise via sa ville.
     * Ce n'est pas une relation Eloquent directe, mais une méthode d'accès.
     */
    public function getPaysAttribute() // Accessor
    {
        // Utilise optional() pour gérer le cas où ville_id est NULL
        return optional($this->ville)->pays;
    }
    public function pays(): BelongsTo
    {
        // Relation vers le modèle Pays
        // Laravel déduit la clé étrangère 'pays_id' par convention
        return $this->belongsTo(Pays::class);
    }
}
