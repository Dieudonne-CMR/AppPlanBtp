<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
                     // Ajouter la colonne pour la clé étrangère après la colonne 'id' (ou une autre colonne pertinente)
                     $table->foreignId('pays_id')       // Crée une colonne unsignedBigInteger 'pays_id'
                     ->after('id')              // Positionne la colonne (optionnel)
                     ->nullable()             // IMPORTANT: Rendre nullable si des entreprises existent déjà SANS pays assigné, ou si vous ne voulez pas la rendre obligatoire immédiatement. Sinon, retirez ->nullable().
                     ->constrained('pays')      // Ajoute la contrainte FK vers la table 'pays' (colonne 'id')
                     ->onDelete('restrict');    // Action si un pays est supprimé:
                                                // 'restrict': Empêche la suppression du pays s'il a des entreprises liées (Sûr).
                                                // 'cascade': Supprime les entreprises liées si le pays est supprimé (Attention!).
                                                // 'set null': Met pays_id à NULL si le pays est supprimé (nécessite ->nullable()).
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
                        // Il est important de supprimer la contrainte AVANT la colonne
                        $table->dropForeign(['pays_id']); // Nom conventionnel de la contrainte: table_colonne_foreign
                        // Alternative plus moderne si vous avez utilisé ->constrained()
                        // $table->dropConstrainedForeignId('pays_id'); 
                        
                        $table->dropColumn('pays_id'); // Supprime la colonne 'pays_id'
        });
    }
};
