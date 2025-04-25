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
        Schema::create('projet_realise', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('lieu')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('photo1')->nullable(); // Stocker les chemins des images en JSON
            $table->string('photo2')->nullable(); // Stocker les chemins des images en JSON
            $table->string('photo3')->nullable(); // Stocker les chemins des images en JSON

            // Clé étrangère vers entreprises
            $table->foreignId('entreprise_id')
                  ->constrained('entreprises')
                  ->onDelete('cascade'); // Si l'entreprise est supprimée, ses projets aussi

            // Optionnel: Lier un projet à un plan spécifique (si pertinent)
            // $table->foreignId('plan_id')->nullable()->constrained('plans')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_realise');
    }
};
