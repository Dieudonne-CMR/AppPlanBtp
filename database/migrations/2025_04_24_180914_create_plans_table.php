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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->double('surface')->nullable(); // Surface du plan
            $table->double('prix')->nullable(); // Prix du plan
            $table->string('photo')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo1')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo2')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo3')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo4')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo5')->nullable(); // Chemin vers le fichier du plan
            $table->string('photo6')->nullable(); // Chemin vers le fichier du plan
            $table->date('date_creation')->nullable();

            // Clé étrangère vers entreprises
            $table->foreignId('entreprise_id')
                  ->constrained('entreprises') // Assure que l'ID existe dans la table entreprises
                  ->onDelete('cascade'); // Si l'entreprise est supprimée, ses plans aussi

            // Clé étrangère vers categorie_plan
            $table->foreignId('categorie_plan_id')
                  ->constrained('categorie_plan') // Assure que l'ID existe dans la table categorie_plan
                  ->onDelete('restrict'); // Empêche la suppression d'une catégorie si des plans y sont liés

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
