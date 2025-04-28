<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Vérifier si doctrine/dbal est installé avant de tenter de supprimer une colonne
         if (! Schema::hasColumn('entreprises', 'ville_id')) { // Ajouter cette vérification peut aider dans certains cas de re-run
            Schema::table('entreprises', function (Blueprint $table) {
                // Ajouter la colonne pour la clé étrangère vers 'villes'
                // SANS ->after()
                $table->foreignId('ville_id')
                      ->nullable()
                      // ->after('description') // <-- SUPPRIMER CECI
                      ->constrained('villes')
                      ->onDelete('set null');

                // Ajouter la colonne complémentaire (SANS ->after())
                $table->string('adresse_complement')->nullable();
                      // ->after('ville_id'); // <-- SUPPRIMER CECI

                // Essayer de supprimer l'ancienne colonne (nécessite doctrine/dbal)
                // Si cela pose toujours problème, commentez-le temporairement
                if (Schema::hasColumn('entreprises', 'adresse')) {
                     $table->dropColumn('adresse');
                }
            });
        } elseif (Schema::hasColumn('entreprises', 'adresse') && !Schema::hasColumn('entreprises', 'adresse_complement')) {
             // Gérer le cas où ville_id existe mais pas adresse_complement et adresse existe toujours
             Schema::table('entreprises', function (Blueprint $table) {
                 $table->string('adresse_complement')->nullable();
                 $table->dropColumn('adresse');
             });
        }
    }

    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            // Il est plus sûr de vérifier si les colonnes existent avant de les supprimer/modifier
            // Surtout pendant les rollbacks après erreur

            if (Schema::hasColumn('entreprises', 'ville_id')) {
                // Pour SQLite, dropForeign est souvent peu fiable ou non nécessaire avant dropColumn
                // Essayez de supprimer directement la colonne
                // $table->dropForeign(['ville_id']); // <-- Peut être commenté pour SQLite
                $table->dropColumn('ville_id');
            }

            if (Schema::hasColumn('entreprises', 'adresse_complement')) {
                $table->dropColumn('adresse_complement');
            }

            // Recréer l'ancienne colonne 'adresse' si elle n'existe pas déjà
            if (!Schema::hasColumn('entreprises', 'adresse')) {
                $table->string('adresse')->nullable();
            }
        });
    }
};