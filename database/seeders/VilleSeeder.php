<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pays; // Importer le modèle Pays
use App\Models\Ville; // Importer le modèle Ville
use Faker\Factory as Faker; // Importer Faker pour générer des noms

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optionnel mais recommandé : vider la table villes avant de seeder
        Ville::query()->delete(); 

        // Récupérer tous les pays existants
        $pays = Pays::all(); // Ou Pays::cursor() pour de très nombreux pays

        // Vérifier s'il y a des pays à traiter
        if ($pays->isEmpty()) {
            $this->command->warn('Aucun pays trouvé dans la base de données. Impossible de seeder les villes.');
            return; // Arrêter le seeder s'il n'y a pas de pays
        }

        // Initialiser Faker (par exemple en français pour des noms à consonance française)
        $faker = Faker::create('fr_FR'); 
        
        $nombreVillesParPays = 10;
        $villesCreesTotal = 0;

        $this->command->info("Début du seeding des villes...");
        $this->command->getOutput()->progressStart($pays->count()); // Barre de progression

        // Boucler sur chaque pays
        foreach ($pays as $p) {
            // Créer 10 villes pour le pays actuel
            for ($i = 0; $i < $nombreVillesParPays; $i++) {
                Ville::create([
                    'nom' => $faker->city, // Génère un nom de ville aléatoire
                    'pays_id' => $p->id,  // Associe la ville au pays actuel
                ]);
                $villesCreesTotal++;
            }
            $this->command->getOutput()->progressAdvance(); // Avancer la barre de progression
        }
        
        $this->command->getOutput()->progressFinish(); // Terminer la barre de progression
        $this->command->info("Seeding des villes terminé ! {$villesCreesTotal} villes ajoutées pour " . $pays->count() . " pays.");
    }
}