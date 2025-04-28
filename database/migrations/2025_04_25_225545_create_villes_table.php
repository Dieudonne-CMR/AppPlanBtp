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
        Schema::create('villes', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('nom'); // Nom de la ville (ex: Paris, Montréal)

            // Clé étrangère vers la table pays
            $table->foreignId('pays_id')
                  ->constrained('pays') // Assure que l'ID existe dans la table pays
                  ->onDelete('cascade'); // Si un pays est supprimé, ses villes aussi (ou 'restrict' pour empêcher)

            $table->timestamps();

            // Optionnel: Ajouter un index unique pour le couple (nom, pays_id)
            // pour éviter "Paris" deux fois dans le même pays
            // $table->unique(['nom', 'pays_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villes');
    }
};
