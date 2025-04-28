<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Entreprise; // Corrected the class name to match the likely intended model

class Pays extends Model
{
    use HasFactory;

    protected $table = 'pays'; // Bonne pratique de spécifier la table

    protected $fillable = ['nom', 'code_iso'];

      /**
     * Obtenir toutes les villes pour ce pays.
     */
    public function villes(): HasMany
    {
        return $this->hasMany(Ville::class);
    }

        /**
     * Obtenir toutes les entreprises situées dans ce pays (via les villes).
     */
    // public function entreprises(): HasManyThrough
    // {
    //     // Paramètres: Modèle final, Modèle intermédiaire
    //     // Clé étrangère sur le modèle intermédiaire (villes.pays_id -> par défaut pays_id)
    //     // Clé étrangère sur le modèle final (entreprises.ville_id -> par défaut ville_id)
    //     // Clé locale sur ce modèle (pays.id -> par défaut id)
    //     // Clé locale sur le modèle intermédiaire (villes.id -> par défaut id)
    //     return $this->hasManyThrough(Entreprise::class, Ville::class);
    // }
    public function entreprises(): HasMany
    {
        // Relation vers le modèle Enterprise
        // Laravel cherchera la clé étrangère 'pays_id' dans la table 'entreprises'
        return $this->hasMany(Entreprise::class); // Updated to use the corrected class name
    }

    // Removed duplicate 'villes' method to avoid redeclaration error.
    

}
