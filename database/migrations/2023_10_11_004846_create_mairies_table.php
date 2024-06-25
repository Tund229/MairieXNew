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
        Schema::create('mairies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('state')->default(1);
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->timestamps();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mairies');
    }
};
