<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guichet_naissances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('lieu_naissance');
            $table->date('date_naissance');
            $table->string('telephone');
            $table->integer('nombre_copies');
            $table->string('prenom_pere');
            $table->string('nom_prenom_mere');
            $table->integer('annee_registre');
            $table->string('numero_acte_naissance');
            $table->json('infos_demande')->nullable();
            $table->string('code')->nullable();
            $table->enum('state', ['en_traitement', 'rejeté', 'terminé'])->default('en_traitement');
            $table->string('fichier_joint')->nullable(); // Nouvelle colonne pour le fichier joint
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
        Schema::dropIfExists('guichet_naissances');
    }
};
