<?php

namespace Database\Seeders;

// Pas besoin de 'use Illuminate\Support\Facades\DB;' ici

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pays; // Assurez-vous que le chemin est correct

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rend le seeder idempotent en supprimant les anciennes données
        // C'est souvent préférable à truncate() si des clés étrangères existent ailleurs
        Pays::query()->delete();

        $paysAfricains = [
            // Afrique du Nord
            ['nom' => 'Algérie', 'code_iso' => 'DZA'],
            ['nom' => 'Égypte', 'code_iso' => 'EGY'],
            ['nom' => 'Libye', 'code_iso' => 'LBY'],
            ['nom' => 'Maroc', 'code_iso' => 'MAR'],
            ['nom' => 'Soudan', 'code_iso' => 'SDN'],
            ['nom' => 'Tunisie', 'code_iso' => 'TUN'],
            ['nom' => 'Sahara Occidental', 'code_iso' => 'ESH'], // Statut contesté

            // Afrique de l'Ouest
            ['nom' => 'Bénin', 'code_iso' => 'BEN'],
            ['nom' => 'Burkina Faso', 'code_iso' => 'BFA'],
            ['nom' => 'Cap-Vert', 'code_iso' => 'CPV'],
            ['nom' => 'Côte d\'Ivoire', 'code_iso' => 'CIV'],
            ['nom' => 'Gambie', 'code_iso' => 'GMB'],
            ['nom' => 'Ghana', 'code_iso' => 'GHA'],
            ['nom' => 'Guinée', 'code_iso' => 'GIN'],
            ['nom' => 'Guinée-Bissau', 'code_iso' => 'GNB'],
            ['nom' => 'Liberia', 'code_iso' => 'LBR'],
            ['nom' => 'Mali', 'code_iso' => 'MLI'],
            ['nom' => 'Mauritanie', 'code_iso' => 'MRT'],
            ['nom' => 'Niger', 'code_iso' => 'NER'],
            ['nom' => 'Nigeria', 'code_iso' => 'NGA'],
            ['nom' => 'Sénégal', 'code_iso' => 'SEN'],
            ['nom' => 'Sierra Leone', 'code_iso' => 'SLE'],
            ['nom' => 'Togo', 'code_iso' => 'TGO'],

            // Afrique Centrale
            ['nom' => 'Angola', 'code_iso' => 'AGO'],
            ['nom' => 'Cameroun', 'code_iso' => 'CMR'],
            ['nom' => 'République centrafricaine', 'code_iso' => 'CAF'],
            ['nom' => 'Tchad', 'code_iso' => 'TCD'],
            ['nom' => 'République du Congo', 'code_iso' => 'COG'], // Congo-Brazzaville
            ['nom' => 'République démocratique du Congo', 'code_iso' => 'COD'], // Congo-Kinshasa
            ['nom' => 'Guinée équatoriale', 'code_iso' => 'GNQ'],
            ['nom' => 'Gabon', 'code_iso' => 'GAB'],
            ['nom' => 'Sao Tomé-et-Principe', 'code_iso' => 'STP'],

            // Afrique de l'Est
            ['nom' => 'Burundi', 'code_iso' => 'BDI'],
            ['nom' => 'Comores', 'code_iso' => 'COM'],
            ['nom' => 'Djibouti', 'code_iso' => 'DJI'],
            ['nom' => 'Érythrée', 'code_iso' => 'ERI'],
            ['nom' => 'Éthiopie', 'code_iso' => 'ETH'],
            ['nom' => 'Kenya', 'code_iso' => 'KEN'],
            ['nom' => 'Madagascar', 'code_iso' => 'MDG'],
            ['nom' => 'Malawi', 'code_iso' => 'MWI'],
            ['nom' => 'Maurice', 'code_iso' => 'MUS'],
            ['nom' => 'Mozambique', 'code_iso' => 'MOZ'],
            ['nom' => 'Rwanda', 'code_iso' => 'RWA'],
            ['nom' => 'Seychelles', 'code_iso' => 'SYC'],
            ['nom' => 'Somalie', 'code_iso' => 'SOM'],
            ['nom' => 'Soudan du Sud', 'code_iso' => 'SSD'],
            ['nom' => 'Tanzanie', 'code_iso' => 'TZA'],
            ['nom' => 'Ouganda', 'code_iso' => 'UGA'],
            ['nom' => 'Zambie', 'code_iso' => 'ZMB'],
            ['nom' => 'Zimbabwe', 'code_iso' => 'ZWE'],

            // Afrique Australe
            ['nom' => 'Botswana', 'code_iso' => 'BWA'],
            ['nom' => 'Eswatini', 'code_iso' => 'SWZ'], // anciennement Swaziland
            ['nom' => 'Lesotho', 'code_iso' => 'LSO'],
            ['nom' => 'Namibie', 'code_iso' => 'NAM'],
            ['nom' => 'Afrique du Sud', 'code_iso' => 'ZAF'],
        ];

        // Préparer les données pour l'insertion en ajoutant les timestamps
        $dataToInsert = [];
        $now = now(); // Obtenir l'heure actuelle une seule fois
        foreach ($paysAfricains as $pays) {
            $dataToInsert[] = [
                'nom' => $pays['nom'],
                'code_iso' => $pays['code_iso'] ?? null, // Bonne pratique
                'created_at' => $now, // Nécessaire pour insert()
                'updated_at' => $now, // Nécessaire pour insert()
            ];
        }

        // Insérer les données en une seule requête (efficace)
        // insert() ne déclenche PAS les événements Eloquent et ne remplit PAS les timestamps auto.
        Pays::insert($dataToInsert);

        // Afficher un message dans la console
        $count = count($dataToInsert);
        $this->command->info("Table des pays africains remplie avec succès ! ({$count} pays ajoutés)");
    }
}