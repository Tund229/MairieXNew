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
        Schema::create('guichet_mariages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('nom_epoux');
            $table->string('prenom_epoux');
            $table->string('nom_epouse');
            $table->string('prenom_epouse');
            $table->string('telephone');
            $table->integer('nombre_copies');
            $table->integer('annee_registre');
            $table->string('numero_registre_bulletin');
            $table->enum('state', ['en_traitement', 'rejeté', 'terminé'])->default('en_traitement');
            $table->string('code')->nullable();
            $table->json('infos_demande')->nullable();
            $table->string('fichier')->nullable();
            $table->json('fichiers_joints')->nullable(); // Colonnes pour les fichiers joints en JSON
            $table->timestamps();
            $table->timestamp('date_validation_rejet')->nullable();
            $table->text('motif')->nullable();
            $table->foreign('agent_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guichet_mariages');
    }
};
