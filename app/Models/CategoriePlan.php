<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriePlan extends Model
{
    use HasFactory;

    // Spécifier le nom de la table si différent de la convention 'categorie_plans'
    protected $table = 'categorie_plan';

    protected $fillable = ['nom', 'description'];

    /**
     * Les plans appartenant à cette catégorie.
     */
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}
