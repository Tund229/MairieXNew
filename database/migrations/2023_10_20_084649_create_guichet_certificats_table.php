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
        Schema::create('guichet_certificats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('lieu_naissance');
            $table->integer('nombre_copies');
            $table->string('fichier')->nullable();
            $table->json('fichiers_joints')->nullable(); // Nouvelle colonne pour le fichier joint en JSON
            $table->enum('state', ['en_traitement', 'rejeté', 'terminé'])->default('en_traitement');
            $table->string('code')->nullable();
            $table->json('infos_demande')->nullable();
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
        Schema::dropIfExists('guichet_certificats');
    }
};
