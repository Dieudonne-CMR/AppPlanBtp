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
        Schema::create('pays', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('nom')->unique(); // Nom du pays (ex: France, Canada)
            $table->string('code_iso', 3)->unique()->nullable(); // Code ISO (ex: FRA, CAN) - optionnel mais utile
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
