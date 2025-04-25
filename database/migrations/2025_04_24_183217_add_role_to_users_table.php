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
        Schema::table('users', function (Blueprint $table) {
            // Définir les rôles possibles: 'super_admin', 'gerant', 'client' (peut-être plus tard)
            // Mettre 'gerant' par défaut ou un autre rôle si l'inscription est ouverte
            $table->string('role')->default('gerant'); // Ou 'client' si inscription publique
            // $table->enum('role', ['super_admin', 'gerant'])->default('gerant'); // Alternative plus stricte
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
