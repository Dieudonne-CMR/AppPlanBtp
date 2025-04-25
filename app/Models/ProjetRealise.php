<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjetRealise extends Model
{
    use HasFactory;

    // Spécifier le nom de la table si différent de la convention 'projet_realises'
    protected $table = 'projet_realise';

    protected $fillable = [
        'nom', 
        'description', 
        'lieu', 
        'date_debut', 
        'date_fin', 
        'photo1',
        'photo2',
        'photo3 ',
        'entreprise_id'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'images' => 'array', // Pour caster le JSON en tableau PHP automatiquement
    ];

    /**
     * L'entreprise qui a réalisé ce projet.
     */
    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

     /**
     * Optionnel: Le plan associé à ce projet.
     */
    // public function plan(): BelongsTo
    // {
    //     return $this->belongsTo(Plan::class);
    // }
}
