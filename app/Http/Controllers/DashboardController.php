<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logique pour récupérer les données nécessaires pour le tableau de bord
        // Par exemple, vous pouvez récupérer les plans, les entreprises, etc.
        $plans = \App\Models\Plan::all();
        $entreprises = \App\Models\Entreprise::all();

        return view('dashboard', compact('plans', 'entreprises'));
    }
}
