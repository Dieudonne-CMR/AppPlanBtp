<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 
        'description',
        'surface',
        'prix',
        'photo',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'photo6',
        'date_creation',
        'entreprise_id', 
        'categorie_plan_id'
    ];

    protected $casts = [
        'date_creation' => 'date',
    ];

    /**
     * L'entreprise à laquelle ce plan appartient.
     */
    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

    /**
     * La catégorie à laquelle ce plan appartient.
     */
    public function categorie(): BelongsTo
    {
        // Spécifier la clé étrangère si elle ne suit pas la convention 'categorie_plan_id'
        return $this->belongsTo(CategoriePlan::class, 'categorie_plan_id');
    }
}
