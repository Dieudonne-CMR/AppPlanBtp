<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Plan;
use \App\Models\Entreprise;


class DashboardController extends Controller
{
    public function index()
    {
        // Logique pour récupérer les données nécessaires pour le tableau de bord
        // Par exemple, vous pouvez récupérer les plans, les entreprises, etc.
        $plans = Plan::all();
        $entreprises = Entreprise::all();

        return view('dashboard', compact('plans', 'entreprises'));
    }
}
