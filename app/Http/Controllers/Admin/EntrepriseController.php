<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Pays;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function liste()
    {
        // Récupérer la liste des entreprises
        $entreprises = Entreprise::all();
        return view('entreprises.liste', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupérer la liste des pays pour le formulaire de création d'entreprise
        $pays= Pays::all();
        return view('entreprises.create', compact('pays'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        // dd($request);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email_contact' => 'required|email|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ville_id' => 'required|exists:villes,id', // Validation de la ville
            'pays_id' => 'required|exists:pays,id', // Validation du pays
        ]);

        // // Création de l'entreprise
        // if ($request->hasFile('logo')) {
        //     $logoPath = $request->file('logo')->store('logos', 'public');
        //     $request->merge(['logo' => $logoPath]);
        // }
         // Gérer les fichiers uploadés
         if($request->hasFile('logo')){
            $validated['logo']=  $request->file('logo')->store('logos', 'public');
        }
        Entreprise::create($validated);

        return redirect()->route('admin.createEntreprise')->with('success', 'Entreprise créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise, Request $request)
    {
        // Vérifier si l'utilisateur est un gérant de l'entreprise
        if ($request->user()->isGerant()) {
            // Vérifier si l'utilisateur a accès à cette entreprise
            if (!$request->user()->entreprises->contains($entreprise)) {
                return redirect()->route('admin.ListeEntreprise')->with('error', 'Accès refusé à cette entreprise.');
            }
        }

        // Vérifier si l'utilisateur est un super admin
        if ($request->user()->isSuperAdmin()) {
            // Pas de restriction d'accès
        }
    {
        // Récupérer les détails de l'entreprise
        $entreprise = Entreprise::find($entreprise->id);
        return view('entreprises.show', compact('entreprise'));
    }
        // Si l'utilisateur n'est ni gérant ni super admin, rediriger
        return redirect()->route('admin.ListeEntreprise')->with('error', 'Accès refusé.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
