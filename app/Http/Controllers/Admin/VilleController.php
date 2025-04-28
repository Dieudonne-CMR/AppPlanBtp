<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Pays;

class VilleController extends Controller
{
    public function getVilles(Pays $pays)
    {
        // Récupérer les villes associées au pays donné
        // Utilise la relation définie dans le modèle Pays
        $villes = $pays->villes()->orderBy('nom', 'asc')->get(['id', 'nom']);
        return response()->json($villes);

        // Retourner les villes sous forme de JSON
        return response()->json($villes);
    }
}
