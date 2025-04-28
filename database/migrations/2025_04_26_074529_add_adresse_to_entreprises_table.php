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
             // Ajoute une colonne de type string nommée 'adresse'
             $table->string('adresse')
             ->nullable() // IMPORTANT: Rendre nullable si la table contient déjà des lignes !
             ->after('nom'); // Optionnel: Spécifie où placer la colonne (après 'nom' ici)
                            // Si vous avez besoin de stocker des adresses longues,
                            // envisagez d'utiliser ->text('adresse') à la place de ->string()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropColumn('adresse');
        });
    }
};
